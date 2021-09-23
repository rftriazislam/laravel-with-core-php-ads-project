<?php

  require_once('dbconnect.php');

  class Dbaccess {

    protected static $db;
    public static $instance;

    private function __construct() {
      self::$db = Dbconnect::getConnection();
      self::$instance = $this;
      self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }

    public static function getDbAccess() {
      if(!self::$instance) {
        new Dbaccess();
      }

      return self::$instance;
    }
    
    public function getData($query,$fields) {
      try {

        $statement = self::$db->prepare($query);
        $statement->execute($fields);

        $result_array = array();
        while($result = $statement->fetchObject()) 
        {
          array_push($result_array, $result);
        }

        if(sizeof($result_array) == 0) {
          //throw new Exception("Data not found");
        }

        return $result_array;

      } catch(PDOException $e) {
        throw new Exception("Database query error");
      } catch(Exception $e) {
        throw new Exception($e->getMessage());
      }

    }

    public function postData($query,$fields) {

      try {
        $statement = self::$db->prepare($query);
        $statement->execute($fields);
        return "successfull";

      } 
      catch(PDOException $e) {
          return self::$db->errorInfo();
      }

    }

    public function register($query,$fields) {

      try {
        $statement = self::$db->prepare($query);
        $statement->execute($fields);

        return (int) self::$db->lastInsertId();

      }
      catch(PDOException $e) 
      {
        return self::$db->errorInfo();
      }

    }

    public function postNew($table, $fields, $values)
    {
      try {
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
        $statement = self::$db->prepare($query);
        $statement->execute();
      }
      catch(PDOException $e)
      {
        return self::$db->errorInfo();
      }
    }



    public function getRowNum($query)
    {
      try{
        $statement = self::$db->prepare($query);
        $statement->execute();
        return $statement->fetchColumn();
      }
      catch(PDOException $e) 
      {
        return self::$db->errorInfo();
      }      
    }

    public function getRow($query)
    {
      try{
        $statement = self::$db->prepare($query);
        $statement->execute();
        return $statement->fetch();
      }
      catch(PDOException $e) 
      {
        return self::$db->errorInfo();
      }
    }

    public function getRowObject($query)
    {
      try{
        $statement = self::$db->prepare($query);
        $statement->execute();
        return $statement->fetchObject();
      }
      catch(PDOException $e) 
      {
        return self::$db->errorInfo();
      }
    }

    public function getRowNumber($query)
    {
      try{
        $statement = self::$db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        return count($result);
      }
      catch(PDOException $e) 
      {
        return self::$db->errorInfo();
      }      
    }

  }

?>

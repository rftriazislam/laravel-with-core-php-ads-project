<?php

  class Dbconnect {

    protected static $db;

    private function __construct() {
        try {
          $db_user = 'user@name';
          $db_pass = 'root';

          self::$db = new PDO('mysql:host=127.0.0.1:8000;dbname=database', $db_user, $db_pass);
          self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
          echo "Database connection Error: ".$e->getMessage();
          die;
        }

    }

    public static function getConnection() {

      if (!self::$db) {
        new Dbconnect();
      }

      return self::$db;
    }

  }

  //Dbconnect::getConnection();

?>

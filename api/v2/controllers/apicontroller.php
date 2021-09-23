<?php

  include_once '../models/apimodel.php';
  include_once '../models/teammodel.php';
  include_once 'generalcontroller.php';
  include_once '../models/advalleymodel.php';

  $controller = new GeneralController(new ApiModel());

  $method = $_SERVER['REQUEST_METHOD'];

  switch ($method) {
    case 'GET':
      //$controller = new GeneralController(new AdvalleyModel());
      $controller->getRequest(); 
      break;
    case 'POST':
      if(isset($_POST['mod'])) 
      {
          if($_POST['mod'] == 'team')
          {
              $tcontroller = new GeneralController(new TeamModel());
              $tcontroller->postRequest();
          }
          elseif ($_POST['mod'] == 'valley') {
              $tcontroller = new GeneralController(new AdvalleyModel());
              $tcontroller->postRequest();
          }
      }
      else
          $controller->postRequest(); 
      break;
    default:
      echo json_encode(array("error" => true, "message" => "Wrong HTTP method"), JSON_UNESCAPED_UNICODE);
      break;
  }

?>

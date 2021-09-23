<?php
  $header = "Content-Type: application/json";
  header($header);

  class GeneralController {

    public $model;

    public function __construct($model) {
      $this->model = $model;
    }

    function parseJson($data) {
      return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    function getRequest() {

      if(isset($_GET['action'])) {
          switch($_GET['action']) {
              case "getall":
                  try {
                    echo $this->parseJson($this->model->getAll());
                  } catch(Exception $e) {
                    echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
                  }
                  break;
              case 'get-users':
                  $data = $this->model->getUserId();
                  print_r($data);
                  break;
              case "getbyid":
                  try {
                    echo $this->parseJson($this->model->getById($_GET['id']));
                  } catch(Exception $e) {
                    echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
                  }
                  break;
              default:
                  echo $this->parseJson(array("error" => true, "message" => "API route is not defined"));
                  break;
          }
      }

    }

    
    function postRequest() {
        if(isset($_POST['action'])) {
            switch($_POST['action']) 
            {
                case "register":
                    echo $this->parseJson( $this->model->registerUser() );
                break;
                case 'auto':
                    echo $this->parseJson( $this->model->autoLogin() );
                  break;
                case 'login':
                    echo $this->parseJson( $this->model->signIn() );
                  break;
                case 'team':
                    echo $this->parseJson( $this->model->myTeam() );
                  break;
                case 'hotlist':
                    echo $this->parseJson( $this->model->hotList() );
                  break;
                case 'upline':
                    echo $this->parseJson( $this->model->getUpline() );
                    break;
                case 'dash':
                    echo $this->parseJson( $this->model->getDashboard() );
                  break;
                case 'tree':
                    echo $this->parseJson( $this->model->treeView() );
                  break;
                case 'profile':
                    echo $this->parseJson( $this->model->getProfileData() );
                  break;
                case 'rank':
                    echo $this->parseJson( $this->model->getMyRanks() );
                  break;
                case 'challenge':
                    echo $this->parseJson( $this->model->getChallenge() );
                  break;
                case 'chl-suc':
                    echo $this->parseJson( $this->model->updateChallenge() );
                    break;
                case 'advalley':
                    echo $this->parseJson( $this->model->advalleyBoard() );
                  break;
                case 'proup':
                    echo $this->parseJson( $this->model->updateProfile() );
                  break;
                case 'propic':
                    echo $this->parseJson( $this->model->uploadImage() );
                  break;
                case 'update_pass':
                    echo $this->parseJson( $this->model->updatePassword() );
                  break;
                case 'adlist':
                    echo $this->parseJson( $this->model->showAds() );
                  break;
                case 'dvideo':
                 	  echo $this->parseJson( $this->model->updateDreamployVideoEarning() );
                 	break;
                // case 'adcolony':
                //     echo $this->parseJson( $this->model->adColonyRewards() );
                //   break;
                case 'withdraw-data':
                    echo $this->parseJson( $this->model->loadWithdrawData() );
                  break;

                case 'income-valley':
                  echo $this->parseJson( $this->model->incomevalleyBoard() );
                  break;

                case 'earn-more':
                  echo $this->parseJson( $this->model->earnMoreBoard() );
                  break;

                case 'media-social':
                  echo $this->parseJson( $this->model->mediaSocialBoard() );
                  break;
            }
        }
    }

  }

?>

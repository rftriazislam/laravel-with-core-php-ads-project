<?php

require_once('../../dbaccess.php');
require_once('../../validator/vendor/autoload.php');
require_once('../helpers/rankhelper.php');

class TeamModel
{
	protected $db_access;
	protected $validator;
	protected $current_time;
	protected $errors;
	
	function __construct()
	{
		$this->db_access = Dbaccess::getDbAccess();
		$this->current_time = date('Y-m-d H:i:s');
		$this->errors = array();
	}

	function googleAdRewards($userid)
	{
		//Update Self D Ad Impression
		//$selfQ = "UPDATE ad_valley_impression SET selfgoogle_ad=(selfgoogle_ad+1) WHERE userid={$userid}";
		//$this->db_access->postData($selfQ, array());

		// $getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userid}";
		// $uplineResult = $this->db_access->getRowObject($getUpline);
		// $uplinesData = explode(',', $uplineResult->upline_users);
		// foreach ($uplinesData as $uplineData) 
		// {
		// 	$sponsorData = explode('->', $uplineData);
		// 	$sponsorid = trim($sponsorData[0]);
		// 	$level = trim($sponsorData[1]);

		// 	$columnName = 'lvl'.$level.'google_ad';
		// 	$impression = $columnName."+1";
		// 	$sponsorUpdateQ = "UPDATE ad_valley_impression SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
		// 	$this->db_access->postData($sponsorUpdateQ, array());

		// }
	}

	function updateChallenge()
	{
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'chlid', 'last']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'chlid');
		$this->validator->rule('integer', 'last');
		if( $this->validator->validate() )
		{
			$id = $_POST['userid'];
			$challenge_id = $_POST['chlid'];
			$upQuery = "UPDATE challenge SET downloaded_times=(downloaded_times+1) WHERE id={$challenge_id}";
			if( $this->db_access->postData($upQuery, array()) == 'successfull' )
			{
				$getChlQ = "SELECT name, image, url, description FROM challenge WHERE id={$challenge_id}";
				$result = $this->db_access->getRowObject($getChlQ);

				$countQ = "SELECT count(id) FROM challenge_tracer WHERE userid={$id} AND app_url={$result->url}";
				if( $this->db_access->getRowNum($countQ) > 0 )
				{
					$fUpResult = 'successfull';
				}
				else{
					$fields = array(
						'userid'=>$id,
						'challenge_id'=>$challenge_id,
						'app_name'=>$result->name,
						'app_image'=>$result->image,
						'app_url'=>$result->url,
						'app_description'=>$result->description
						);
					$query = "INSERT INTO challenge_tracer(userid, challenge_id, app_name, app_image, app_url, app_description)
					VALUES(:userid, :challenge_id, :app_name, :app_image, :app_url, :app_description)";
					$fUpResult = $this->db_access->postData($query, $fields);
				}
				
				if( $fUpResult == 'successfull' )
				{
					if( $_POST['last'] == 1 )
					{
						$updateUser = "UPDATE users SET active=1 WHERE id={$id}";
						$update = $this->db_access->postData($updateUser, array());
					}
				}
				else
					$this->errors['chlid'] = "Data Update Error, Try Again";

			}
			else
				$this->errors['chlid'] = "Data Update Error, Try Again";
		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		$output = array(
			'status'=> empty($this->errors) ? '1' : '0',
			'msg'=>empty($this->errors) ? 'Update Success' : 'Error Occured',
			'errors'=> empty($this->errors) ? $this->errors : array($this->errors)
			);
		return $output;
	}

	function getChallenge()
	{
		$challenge = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');
		if( $this->validator->validate() )
		{
			$id = $_POST['userid'];
			$admob = $_POST['admob'];

			if( $admob == 1 )
				$this->googleAdRewards($id);

			$query = "SELECT users.country, challenge.id, challenge.name, challenge.image, challenge.description, challenge.url FROM users JOIN challenge ON challenge.country=users.country WHERE users.id={$id} AND challenge.download_number>challenge.downloaded_times";
			$challenge = $this->db_access->getData($query, array());
		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		$output = array(
			'status'=> empty($this->errors) ? '1' : '0',
			'msg'=>empty($this->errors) ? 'Data Success' : 'Error Occured',
			'errors'=> empty($this->errors) ? $this->errors : array($this->errors),
			'challenge_data'=>$challenge
			);
		return $output;
	}

	function getMyRanks()
	{
		$user_data = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');

		if( $this->validator->validate() )
		{
			$id = $_POST['userid'];
			$admob = $_POST['admob'];
			if( $admob == 1 )
				$this->googleAdRewards($id);

			$query = "SELECT rank, target_rank FROM ranks WHERE userid={$id}";
			
			$result = $this->db_access->getRowObject($query);
			$current_rank = $result->rank;
			$next_rank = $result->target_rank;
			$rankhelper = new RankHelper($current_rank, $next_rank, $id, $this->db_access);
			$user_data = $rankhelper->getRankData();
		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		$output = array(
			'status'=> empty($this->errors) ? '1' : '0',
			'msg'=>empty($this->errors) ? 'Data Success' : 'Error Occured',
			'errors'=> empty($this->errors) ? $this->errors : array($this->errors),
			'rank_data'=>empty($this->errors) ? $user_data : new ArrayObject()
			);
		return $output;
	}

	function uplineHelper($userid)
	{
		$query = "SELECT users.id, users.name, users.phonenumber, users.sponsorid, ranks.rank 
			FROM users JOIN ranks ON ranks.userid=users.id where users.id={$userid}";
		return $this->db_access->getRow($query);
	}

	function generateResponse($status, $msg, $errors, $field, $value)
	{
		$response = array(
			'status'=>$status,
			'msg'=>$msg,
			'errors'=>$errors,
			$field=>$value
			);
		return $response;
	}

	function treeView()
	{
		$generation = array();
		$my_data = array();
		$level1_percent = number_format(0.388888*(40/100),6);
        $level2_4_percent = number_format(0.388888*(10/100),6);
        $level5_10_percent = number_format(0.388888*(5/100),6);

        $this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');

		$id = $_POST['userid'];
		$today = date('Y-m-d');

		if( $this->validator->validate() )
		{
			$admob = $_POST['admob'];

			if( $admob == 1 )
				$this->googleAdRewards($id);

			$query = "SELECT users.name, user_details.image,earnings.referral_income, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_ref, levels.* FROM earnings JOIN users ON users.id=earnings.userid JOIN user_details ON user_details.userid=earnings.userid JOIN levels ON levels.userid=earnings.userid WHERE earnings.userid={$id}";
			$levels = $this->db_access->getRow($query);

			
			$my_data = array(
				'name'=>$levels['name'],
				'image'=>$levels['image'] == '' ? 'http://isido.net/oc-content/plugins/profile_picture/avatar-default.jpg':'https://www.dreamploy.com/'.$levels['image'].'.jpg',
				'total_ref_income'=>$levels['referral_income'],
				'total_ref'=>$levels['total_ref']
				);

			for ($i=2; $i < 12; $i++) 
			{ 
				$init['generation'] = 'Generation '.($i-1);
				$current_level = 'level'.($i-1);
				$init['total_user'] = $levels[$current_level];
				
				if( $i == 2 )
				{
					$init['total_earn'] = $levels[$current_level] * $level1_percent;
				}
				elseif ( $i >= 3 && $i <= 5) 
				{
					$init['total_earn'] = $levels[$current_level] * $level2_4_percent;
				}
				elseif ( $i >= 6 && $i <= 11) 
				{
					$init['total_earn'] = $levels[$current_level] * $level5_10_percent;
				}

				$generation[]= $init;
			}

		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		$output = array(
			'status'=> empty($this->errors) ? '1' : '0',
			'msg'=>empty($this->errors) ? 'Data Success' : 'Error Occured',
			'errors'=> empty($this->errors) ? $this->errors : array($this->errors),
			'own_data'=>empty($this->errors) ? $my_data : new ArrayObject(),
			'level_data'=>$generation
			);
		return $output;
	}

	function getDashboard()
	{
		$generation = array();
		$earning_data = array();
		$withdraw_data = array();
		$level1_percent = number_format(0.388888*(40/100),6);
        $level2_4_percent = number_format(0.388888*(10/100),6);
        $level5_10_percent = number_format(0.388888*(5/100),6);

        $this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');

		$id = $_POST['userid'];
		$today = date('Y-m-d');

		if( $this->validator->validate() )
		{
			$admob = $_POST['admob'];
			if( $admob == 1 )
				$this->googleAdRewards($id);
			$levelQ = "SELECT * FROM levels WHERE userid={$id}";
			$levels = $this->db_access->getRow($levelQ);

			$referQ = "SELECT referral_income FROM earnings WHERE userid={$id}";
			$referral_income = $this->db_access->getRow($referQ);

			$todayQ = "SELECT * FROM todays_users WHERE userid={$id} AND updated_at LIKE '%{$today}%'";
			$todayTotal = $this->db_access->getRow($todayQ);

			if(empty($todayTotal))
			{
				$todatTotalEarn =0;
            	$todayTotalCount =0;
			}
			else
			{
				$todayLevel1= $todayTotal['level1'];
	            $todayLevel2_4 = $todayTotal['level2'] + $todayTotal['level3'] + $todayTotal['level4'];
	            $todayLevel5_10 =$todayTotal['level5'] + $todayTotal['level6'] + $todayTotal['level7']+$todayTotal['level8'] + $todayTotal['level9'] + $todayTotal['level10'];
	            $todatTotalEarn = ($todayLevel1*$level1_percent) + ($todayLevel2_4*$level2_4_percent) + ($todayLevel5_10*$level5_10_percent);
	            $todayTotalCount = $todayLevel1 +  $todayLevel2_4 + $todayLevel5_10;
			}

			$monthQ = "SELECT * FROM months_users WHERE userid={$id} AND MONTH(updated_at)=MONTH(CURDATE())";
			$monthTotal = $this->db_access->getRow($monthQ);

			if( empty($monthTotal) )
			{
				$monthTotalEarn =0;
            	$monthTotalCount =0;
			}
			else
			{
				$monthLevel1= $monthTotal['level1'];
	            $monthLevel2_4 = $monthTotal['level2'] + $monthTotal['level3'] + $monthTotal['level4'];
	            $monthLevel5_10 = $monthTotal['level5'] + $monthTotal['level6'] + $monthTotal['level7']+$monthTotal['level8'] + $monthTotal['level9'] + $monthTotal['level10'];
	            $monthTotalEarn = ($monthLevel1*$level1_percent) + ($monthLevel2_4*$level2_4_percent) + ($monthLevel5_10*$level5_10_percent);
	            $monthTotalCount = $monthLevel1 +  $monthLevel2_4 + $monthLevel5_10;
			}

			for ($i=2; $i < 12; $i++) 
			{ 
				$init['generation'] = $i-1;
				$init['referal'] = $levels[$i];
				$current_level = 'level'.($i-1);
				if( $i == 2 )
				{
					$init['total_earn'] = $levels[$current_level] * $level1_percent;
				}
				elseif ( $i >= 3 && $i <= 5) 
				{
					$init['total_earn'] = $levels[$current_level] * $level2_4_percent;
				}
				elseif ( $i >= 6 && $i <= 11) 
				{
					$init['total_earn'] = $levels[$current_level] * $level5_10_percent;
				}
				$init['active'] = 0;
				$init['approved'] = 0;
				$init['achieve'] = 'Bronze: 0';

				$generation[]= $init;
			}

			$total_refQ = "SELECT earnings.referral_income, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_ref FROM earnings JOIN levels ON levels.userid=earnings.userid WHERE earnings.userid={$id}";
			$total_result = $this->db_access->getRow($total_refQ);

			$earning_data = array(
				array('row'=>'Today Total', 'referal'=>$todayTotalCount, 'earning'=>$todatTotalEarn, 'active'=>0, 'pending'=>0),
				array('row'=>'This Month Total', 'referal'=>$monthTotalCount, 'earning'=>$monthTotalEarn, 'active'=>0, 'pending'=>0),
				array('row'=>'Total', 'referal'=>$total_result['total_ref'], 'earning'=>$total_result['referral_income'], 'active'=>0, 'pending'=>0)
				);

			$withdraw_data = array(
				array('row'=>'Referrals Income', 'total'=>number_format($total_result['referral_income'], 6), 'withdraw'=>0, 'balance'=>0),
				array('row'=>'Other Income', 'total'=>number_format(1,6), 'withdraw'=>0, 'balance'=>0),
				array('row'=>'Total', 'total'=>number_format( $total_result['referral_income'] + 1 , 6 ), 'withdraw'=>0, 'balance'=>0),
				);
        }
        else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}
		$this->db_access = null;
		$output = array(
			'status'=> empty($this->errors) ? '1' : '0',
			'msg'=>empty($this->errors) ? 'Data Success' : 'Error Occured',
			'errors'=> empty($this->errors) ? $this->errors : array($this->errors),
			'generation_data'=>$generation,
			'earning_data'=>$earning_data,
			'withdraw_data'=>$withdraw_data
			);
		return $output;
	}

	function getUpline()
	{
		$uplineData = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');
		if( $this->validator->validate() )
		{
			$userid = $_POST['userid'];
			$admob = $_POST['admob'];
			if( $admob == 1 )
				$this->googleAdRewards($userid);
			$result = $this->uplineHelper($userid);
			
			while ( !empty( $result ) ) 
			{
				$init['id'] = $result['id'];
				$init['name'] = $result['name'];
				$init['phonenumber'] = $result['phonenumber'];
				$init['sponsorid'] = $result['sponsorid'];
				$init['rank'] = $result['rank'];
				$uplineData[] = $init;
				$parent_id = $result['sponsorid'];
				$result = $this->uplineHelper($parent_id);
			}
		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		if( empty($this->errors) )
			$output = $this->generateResponse('1', 'Data Success', $this->errors, 'upline', $uplineData);
		else
			$output = $this->generateResponse('0', 'Error Occured', array($this->errors), 'upline', array());

		return $output;
	}

	function hotList()
	{
		$userid = $_POST['userid'];
		$admob = $_POST['admob'];
		if( $admob == 1 )
			$this->googleAdRewards($userid);
		$field = array();

		$latestQ = "SELECT name, country, id FROM users ORDER BY id DESC LIMIT 30";
		$latestResult = $this->db_access->getData($latestQ, $field);

		$ranksQ = "SELECT users.name, users.country, users.id, ranks.rank FROM users JOIN ranks on ranks.userid=users.id WHERE ranks.rank like '%bronze%' ORDER BY ranks.updated_at DESC LIMIT 30";
		$latestRanks = $this->db_access->getData($ranksQ, $field);

		$maxTeamQ = "SELECT users.name, users.country, users.id, levels.total AS team_size FROM users JOIN levels on levels.userid=users.id ORDER BY levels.total DESC LIMIT 30";
		$maxTeamResult = $this->db_access->getData($maxTeamQ, $field);

		$this->db_access = null;

		$response = array(
			'status'=>'1',
			'msg'=>'Hotlist Data',
			'latest_reg'=>$latestResult,
			'max_team'=>$maxTeamResult,
			'latest_gain'=>$latestRanks
			);
		return $response;
	}

	function myTeam()
	{
		$team = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required',['level', 'userid', 'admob']);

		if( $this->validator->validate() )
		{
			$userid = $_POST['userid'];
			$admob = $_POST['admob'];

			if($admob == 1)
				$this->googleAdRewards($userid);

			$level = $_POST['level']+1;
			$query = "select users.id, users.name, users.sponsorid, users.country, users.phonenumber, users.active ,users.created_at, (earnings.joining_income+earnings.referral_income+earnings.others_income) AS total_earn, ranks.rank, levels.total as total_teamsize, '{$level}' as new_level, user_details.phone_no_visivility from users join earnings on earnings.userid=users.id join ranks on ranks.userid=users.id join levels on levels.userid=users.id join user_details on user_details.userid=users.id where users.sponsorid={$userid} LIMIT 20";
			$field = array();
			$results = $this->db_access->getData($query,$field);

			foreach ($results as $result) 
			{
				$team1['id'] = (string)$result->id;
				$team1['name'] = (string)$result->name;
				$team1['sponsorid'] = (string)$result->sponsorid;
				$team1['country'] = (string)$result->country;
				if( $result->phone_no_visivility == 1 )
					$team1['phonenumber'] = (string)$result->phonenumber;
				else
					$team1['phonenumber'] = "Invisible";
				$team1['active'] = (string)$result->active;
				$team1['created_at'] = (string)$result->created_at;
				$team1['total_earn'] = number_format($result->total_earn, 6);
				$team1['rank'] = (string)$result->rank;
				$team1['total_teamsize'] = (string)$result->total_teamsize;
				$team1['new_level'] = (string)$result->new_level;
				$team[] = $team1;
			}
		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		if( empty($this->errors) )
			$output = $this->generateResponse('1', 'Data Success', $this->errors, 'my_team', $team);
		else
			$output = $this->generateResponse('0', 'Error Occured', array($this->errors), 'my_team', array());

		return $output;
	}
}
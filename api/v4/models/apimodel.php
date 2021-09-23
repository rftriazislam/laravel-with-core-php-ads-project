<?php

require_once('../../dbaccess.php');
require_once('../../validator/vendor/autoload.php');
require_once('../helpers/registerhelper.php');
require_once('../helpers/securityhelper.php');

class ApiModel
{
	protected $db_access;
	protected $validator;
	protected $registerhelper;

	function __construct()
	{
		$this->db_access = Dbaccess::getDbAccess();
		$this->registerhelper = new Upline($this->db_access);
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

	function uplineHelper($userid)
	{
		$query = "SELECT sponsorid FROM users WHERE id={$userid}";
		return $this->db_access->getRowObject($query);
	}

	function uplineRelationGenerate($userid)
	{
		$value = "";
		$level = 0;

		$new_user = $this->checkExists('userid', 'user_upline', $userid);

		if ($new_user < 1) {
			$result = $this->uplineHelper($userid);
			while (!empty($result) && $level < 10) {
				$sponsorid = $result->sponsorid;
				$level += 1;
				$value .= "{$sponsorid}->{$level}, ";
				$result = $this->uplineHelper($sponsorid);
			}

			$value = substr($value, 0, -2);

			$query = "INSERT INTO user_upline(userid, upline_users) VALUES({$userid}, '{$value}')";
			$this->db_access->postData($query, array());
		}
	}

	function getUserId()
	{
		$query = "SELECT id FROM users LIMIT 100";
		$field = array();
		return $this->db_access->getData($query, $field);
	}

	function checkExists($field, $table, $value)
	{
		$query = "SELECT count(id) FROM {$table} WHERE {$field}='{$value}'";
		return $this->db_access->getRowNum($query);
	}

	function passHelper($key, $value)
	{
		$query = "SELECT id, password FROM users WHERE {$key}='{$value}'";
		return $this->db_access->getRow($query);
	}

	function updatePassword()
	{
		$msg = "";
		$status = "0";
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'password', 'new_password']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('lengthMin', 'password', 6);
		$this->validator->rule('lengthMin', 'new_password', 6);
		if ($this->validator->validate()) {
			$userid = $_POST['userid'];
			$result = $this->passHelper('id', $userid);
			$storedHash = $result['password'];
			if (password_verify($_POST['password'], $storedHash)) {
				$options = [
					'cost' => 10,
				];
				$safePass = password_hash($_POST['new_password'], PASSWORD_BCRYPT, $options);
				$query = "UPDATE users SET password='{$safePass}' WHERE id={$userid}";
				if ($this->db_access->postData($query, array()) == 'successfull') {
					$msg = "Password Update Successfull";
					$status = "1";
				} else
					$msg = "Can't Update Password, Try Again";
			} else
				$msg = "Wrong Password, Try Again";
		} else {
			foreach ($this->validator->errors() as $key => $value) {
				$msg .= implode(', ', $value) . ',';
			}

			$msg = substr($msg, 0, -1);
		}

		$this->db_access = null;

		$output = array(
			'status' => $status,
			'msg' => $msg
		);
		return $output;
	}

	function uploadImage()
	{
		$errors = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'image']);
		$this->validator->rule('integer', 'userid');
		if ($this->validator->validate()) {
			if (isset($_POST['image'])) {
				$userid = $_POST['userid'];
				$image = $_POST['image'];
				$filename = time() . ".png";

				$file = fopen(__DIR__ . '/../../../public/thumbnail/' . $filename, 'wb');
				if (fwrite($file, base64_decode($image))) {
					$userImage = 'public/thumbnail/' . $filename;
					$query = "UPDATE user_details SET image='{$userImage}' WHERE userid = {$userid}";
					if ($this->db_access->postData($query, $errors) != 'successfull') {
						$errors['failed'] = "Image Upload Failed";
					}
				} else
					$errors['failed'] = "File Write Error - " . $filename;
				fclose($file);
			} else {
				$errors['failed'] = "No Image Uploaded";
			}
		} else {
			foreach ($this->validator->errors() as $key => $value) {
				$errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		$output = array(
			'status' => empty($errors) ? '1' : '0',
			'msg' => empty($errors) ? 'Upload Success' : 'Error Occured'
		);
		return $output;
	}

	function updateProfile()
	{
		$errors = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid']);
		$this->validator->rule('integer', 'userid');
		if ($this->validator->validate()) {
			$data = array($_POST['division'], $_POST['city'], $_POST['town'], $_POST['village'], $_POST['house'], $_POST['birthday'], $_POST['gender'], $_POST['nid'], $_POST['phone_no_visivility'], $_POST['nominee'], $_POST['relation'], $_POST['userid']);
			$query = "UPDATE user_details SET division = ?, city = ?, town = ?, village = ?, house = ?, birthday = ?, gender = ?, nid = ?, phone_no_visivility = ?, nominee = ?, relation = ? WHERE userid = ?";

			$update = $this->db_access->postData($query, $data);

			if ($update != 'successfull') {
				$errors['failed'] = "Update Failed, Try Again";
			}
		} else {
			foreach ($this->validator->errors() as $key => $value) {
				$errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		$output = array(
			'status' => empty($errors) ? '1' : '0',
			'msg' => empty($errors) ? 'Update Success' : 'Error Occured'
		);
		return $output;
	}

	function getProfileData()
	{
		$errors = array();
		$my_data = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'password', 'admob']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');
		$this->validator->rule('lengthMin', 'password', 6);

		if ($this->validator->validate()) {
			$userid = $_POST['userid'];
			$admob = $_POST['admob'];

			if ($admob == 1)
				$this->googleAdRewards($userid);

			$result = $this->passHelper('id', $userid);
			$storedHash = $result['password'];
			if (password_verify($_POST['password'], $storedHash)) {
				$query = "SELECT users.name, users.email, users.phonenumber, users.country, users.sponsorid, user_details.* FROM users JOIN user_details ON user_details.userid=users.id WHERE users.id={$userid}";
				$profile_data = $this->db_access->getRowObject($query);

				$my_data = array(
					'ref_id' => $userid,
					'upline_id' => $profile_data->sponsorid,
					'name' => $profile_data->name,
					'phonenumber' => $profile_data->phonenumber,
					'image' => $profile_data->image == NULL ? 'http://isido.net/oc-content/plugins/profile_picture/avatar-default.jpg' : 'https://www.dreamploy.com/' . $profile_data->image,
					'join_date' => $profile_data->created_at,
					'email' => $profile_data->email,
					'country' => $profile_data->country,
					'city' => $profile_data->city,
					'town' => $profile_data->town,
					'village' => $profile_data->village,
					'house' => $profile_data->house,
					'division' => $profile_data->division,
					'birth_date' => $profile_data->birthday,
					'national_id' => $profile_data->nid,
					'gender' => $profile_data->gender,
					'phone_visible' => $profile_data->phone_no_visivility,
					'nominee' => $profile_data->nominee,
					'nominee_rel' => $profile_data->relation
				);
			} else
				$errors['password'] = "Wrong Password, Try Again";
		} else {
			foreach ($this->validator->errors() as $key => $value) {
				$errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		$output = array(
			'status' => empty($errors) ? '1' : '0',
			'msg' => empty($errors) ? 'Data Success' : 'Error Occured',
			'errors' => empty($errors) ? $errors : array($errors),
			'own_data' => empty($errors) ? $my_data : new ArrayObject(),
		);
		return $output;
	}

	// function checkUserPass($email, $pass, $device)
	// {
	// 	$result = $this->passHelper($email);
	// 	$storedHash = $result['password'];

	// 	if (password_verify($pass, $storedHash)) 
	// 	{
	// 	    echo 'Password is valid!';
	// 	} else {
	// 	    return 0;
	// 	}
	// }

	// function todayTotalEarn($userid)
	// {
	// 	$today = date('Y-m-d');
	// 	$level1_percent = number_format(0.388888*(40/100),6);
	//        $level2_4_percent = number_format(0.388888*(10/100),6);
	//        $level5_10_percent = number_format(0.388888*(5/100),6);

	//        $todayTableQ = "SELECT * FROM todays_users WHERE userid={$userid} AND updated_at LIKE '%{$today}%'";
	//        $todayTotal = $this->db_access->getRow($todayTableQ);

	//       	if( empty($todayTotal) )
	//       	{
	//       		return 0;
	//       	}
	//       	else
	//       	{
	//       		$todayLevel1= $todayTotal['level1'];
	//        	$todayLevel2_4 = $todayTotal['level2'] + $todayTotal['level3'] + $todayTotal['level4'];
	//        	$todayLevel5_10 =$todayTotal['level5'] + $todayTotal['level6'] + $todayTotal['level7']+$todayTotal['level8'] + $todayTotal['level9'] + $todayTotal['level10'];
	//        	$todatTotalEarn = ($todayLevel1*$level1_percent) + ($todayLevel2_4*$level2_4_percent) + ($todayLevel5_10*$level5_10_percent);
	//       		return $todatTotalEarn;
	//       	}

	//  	}

	function calculateEarning($todayTotalRef, $todays_icome, $other_income, $referral_all, $others_all, $micro, $rpincome, $ad_valley_total_income)
	{
		$today_sum = $todayTotalRef + $todays_icome['add_valley'] + $todays_icome['income_valley'] + $todays_icome['earn_more'] + $todays_icome['shopping'] + $todays_icome['media_and_social'] + $micro + $rpincome + $todays_icome['rank_bonus'];
		$total_sum = $referral_all + $ad_valley_total_income + $other_income['income_valley'] + $other_income['earn_more'] + $other_income['shopping'] + $other_income['media_and_social'] + $micro + $rpincome + $other_income['rank_bonus'] + 1;

		$income_data = array(
			array(
				'field_name' => 'Referrals',
				'todays_icome' => $todayTotalRef == NULL ? number_format(0, 6) : number_format($todayTotalRef, 6),
				'total_income' => $referral_all == NULL ? number_format(0, 6) : number_format($referral_all, 6)
			),
			array(
				'field_name' => 'Add Valley',
				'todays_icome' => $todays_icome['add_valley'] == NULL ? number_format(0, 6) : $todays_icome['add_valley'],
				'total_income' => $ad_valley_total_income
			),
			array(
				'field_name' => 'Income Valley',
				'todays_icome' => $todays_icome['income_valley'] == NULL ? number_format(0, 6) : $todays_icome['income_valley'],
				'total_income' => $other_income['income_valley'] == NULL ? number_format(0, 6) : $other_income['income_valley']
			),
			array(
				'field_name' => 'Earn More',
				'todays_icome' => $todays_icome['earn_more'] == NULL ? number_format(0, 6) : $todays_icome['earn_more'],
				'total_income' => $other_income['earn_more'] == NULL ? number_format(0, 6) : $other_income['earn_more']
			),
			array(
				'field_name' => 'Shopping',
				'todays_icome' => $todays_icome['shopping'] == NULL ? number_format(0, 6) : $todays_icome['shopping'],
				'total_income' => $other_income['shopping'] == NULL ? number_format(0, 6) : $other_income['shopping']
			),
			array(
				'field_name' => 'Media & Social',
				'todays_icome' => $todays_icome['media_and_social'] == NULL ? number_format(0, 6) : $todays_icome['media_and_social'],
				'total_income' => $other_income['media_and_social'] == NULL ? number_format(0, 6) : $other_income['media_and_social']
			),
			array(
				'field_name' => 'Microworks',
				'todays_icome' => number_format($micro, 6),
				'total_income' => number_format($micro, 6)
			),
			array(
				'field_name' => 'RP Income',
				'todays_icome' => number_format($rpincome, 6),
				'total_income' => number_format($rpincome, 6)
			),
			array(
				'field_name' => 'Rank Bonus',
				'todays_icome' => $todays_icome['rank_bonus'] == NULL ? number_format(0, 6) : $other_income['rank_bonus'],
				'total_income' => $other_income['rank_bonus'] == NULL ? number_format(0, 6) : $other_income['rank_bonus']
			),
			array(
				'field_name' => 'Total Earning',
				'todays_icome' => $today_sum == NULL ? number_format(0, 6) : number_format($today_sum, 6),
				'total_income' => $total_sum == NULL ? number_format(0, 6) : number_format($total_sum, 6)
			)
		);
		return $income_data;
	}

	function loginHelper($reg_id)
	{
		$level1_percent 			= number_format(0.388888 * (40 / 100), 6);
		$level2_4_percent 			= number_format(0.388888 * (10 / 100), 6);
		$level5_10_percent 			= number_format(0.388888 * (5 / 100), 6);
		$today 						= date('Y-m-d');

		//Get User Information
		$userTableQ 				= "SELECT name FROM users WHERE id={$reg_id}";
		$userTableData 				= $this->db_access->getRow($userTableQ);

		//Get User Income
		$earningTableQ 				= "SELECT add_rpincome, rpincome, `referral_income`, (`joining_income`+`others_income`) AS other_incomes FROM `earnings` WHERE userid={$reg_id}";
		$earningTableData 			= $this->db_access->getRow($earningTableQ);

		$todayQ 					= "SELECT * FROM today_others_incomes WHERE userid={$reg_id}";
		$todays_icome 				= $this->db_access->getRow($todayQ);

		$othersQ 					= "SELECT * FROM others_incomes WHERE userid={$reg_id}";
		$other_income 				= $this->db_access->getRow($othersQ);

		$micro 						= $this->db_access->getRowObject("SELECT SUM(passback_count) as micro_all FROM microworks WHERE userid={$reg_id}");
		$micro 						= $micro->micro_all * 0.000400;

		$todayIncomeQ 				= "SELECT * FROM todays_users WHERE userid={$reg_id} AND updated_at LIKE '%{$today}%'";
		$todayTable 				= $this->db_access->getRowObject($todayIncomeQ);

		$impression 				= $this->db_access->getRowObject("SELECT * FROM ad_valley_impression WHERE userid={$reg_id}");

		// $gad 						= 0.0002;
		// $vad 						= 0.0002;

		// $amount = DB::table('advalley_amount')
		//           ->get()
		//           ->max();

		$amount 					= $this->db_access->getRowObject("SELECT * FROM advalley_amount ORDER BY gad DESC");

		$adValleytotalgoogleads 	= $impression->selfgoogle_ad * $amount->gad +
			$impression->lv1google_ad * $amount->gad * .4 +
			$impression->lv2google_ad * $amount->gad * .1 +
			$impression->lv3google_ad * $amount->gad * .1 +
			$impression->lv4google_ad * $amount->gad * .1 +
			$impression->lv5google_ad * $amount->gad * .05 +
			$impression->lv6google_ad * $amount->gad * .05 +
			$impression->lv7google_ad * $amount->gad * .05 +
			$impression->lv8google_ad * $amount->gad * .05 +
			$impression->lv9google_ad * $amount->gad * .05 +
			$impression->lv10google_ad * $amount->gad * .05;

		$adValleytotaldreamployads = $impression->selfdreamploy_ad * $amount->dad +
			$impression->lv1dreamploy_ad * $amount->dad * .4 +
			$impression->lv2dreamploy_ad * $amount->dad * .1 +
			$impression->lv3dreamploy_ad * $amount->dad * .1 +
			$impression->lv4dreamploy_ad * $amount->dad * .1 +
			$impression->lv5dreamploy_ad * $amount->dad * .05 +
			$impression->lv6dreamploy_ad * $amount->dad * .05 +
			$impression->lv7dreamploy_ad * $amount->dad * .05 +
			$impression->lv8dreamploy_ad * $amount->dad * .05 +
			$impression->lv9dreamploy_ad * $amount->dad * .05 +
			$impression->lv10dreamploy_ad * $amount->dad * .05;

		$adValleytotalvideoads 		= $impression->selfvideo_ad * $amount->vad +
			$impression->lv1video_ad * $amount->vad * .4 +
			$impression->lv2video_ad * $amount->vad * .1 +
			$impression->lv3video_ad * $amount->vad * .1 +
			$impression->lv4video_ad * $amount->vad * .1 +
			$impression->lv5video_ad * $amount->vad * .05 +
			$impression->lv6video_ad * $amount->vad * .05 +
			$impression->lv7video_ad * $amount->vad * .05 +
			$impression->lv8video_ad * $amount->vad * .05 +
			$impression->lv9video_ad * $amount->vad * .05 +
			$impression->lv10video_ad * $amount->vad * .05;

		$ad_valley_total_income 	= number_format($adValleytotalgoogleads + $adValleytotalvideoads + $adValleytotaldreamployads, 6); // + $adValleytotalvideoads;

		if (empty($todayTable)) {
			$todayTotalRef = 0;
		} else {
			$todayLevel1 = $todayTable->level1;
			$todayLevel2_4 = $todayTable->level2 + $todayTable->level3 + $todayTable->level4;
			$todayLevel5_10 = $todayTable->level5 + $todayTable->level6 + $todayTable->level7 + $todayTable->level8 + $todayTable->level9 + $todayTable->level10;
			$todayTotalRef = ($todayLevel1 * $level1_percent) + ($todayLevel2_4 * $level2_4_percent) + ($todayLevel5_10 * $level5_10_percent);
		}


		$others_sum = $ad_valley_total_income + $other_income['income_valley'] + $other_income['earn_more'] + $other_income['shopping'] + $other_income['media_and_social'] + $micro + $earningTableData['rpincome'] + $earningTableData['add_rpincome'] + $other_income['rank_bonus'] + 1;

		$user_data = array(
			'user_name' => $userTableData['name'],
			'user_id' => $reg_id,
			'referral_income' => number_format($earningTableData['referral_income'], 6),
			'other_income' => number_format($others_sum, 6)
		);

		$income_data = $this->calculateEarning($todayTotalRef, $todays_icome, $other_income, $earningTableData['referral_income'], $earningTableData['other_incomes'], $micro, $earningTableData['rpincome'] + $earningTableData['add_rpincome'], $ad_valley_total_income);

		return array($user_data, $income_data);
	}

	function signIn()
	{
		$cur_time = date('Y-m-d H:i:s');
		$response = array();
		$user_data = array();
		$income_data = array();
		$errors = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['email', 'password', 'device_id', 'latitude', 'longitude']);
		if ($this->validator->validate()) {
			if ($this->checkExists('email', 'users', $_POST['email']) == 0)
				$errors['email'] = 'Email invalid, please signup first';
			else {
				$result = $this->passHelper('email', $_POST['email']);
				$storedHash = $result['password'];
				$reg_id = $result['id'];

				if (password_verify($_POST['password'], $storedHash)) {
					//Check User Alreday Has Any Device
					if ($this->checkExists('userid', 'checks', $reg_id) == 0) {
						$device_id = $_POST['device_id'];
						$latitude = $_POST['latitude'];
						$longitude = $_POST['longitude'];
						$fields = "userid, deviceId, latitude, longitude, created_at, updated_at";
						$values = "{$reg_id}, '{$device_id}', '{$latitude}', '{$longitude}', '{$cur_time}', '{$cur_time}'";
						$this->db_access->postNew('checks', $fields, $values);
					} else {
						$upDeviceQ = "UPDATE checks SET deviceId = ?, latitude = ?, longitude = ?, updated_at = ? WHERE userid = ?";
						$this->db_access->postData($upDeviceQ, array($_POST['device_id'], $_POST['latitude'], $_POST['longitude'], $cur_time, $reg_id));
					}

					$this->uplineRelationGenerate($reg_id);

					list($user_data, $income_data) = $this->loginHelper($reg_id);
				} else
					$errors['password'] = 'Invalid password, Try again';
			}
		} else {
			foreach ($this->validator->errors() as $key => $value) {
				$errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		if (empty($errors)) {
			$response = array(
				'status' => '1',
				'msg' => 'User Successfully Signed In',
				'errors' => $errors,
				'user_data' => $user_data,
				'income_data' => $income_data
			);
		} else {
			$response = array(
				'status' => '0',
				'msg' => 'Error Occured',
				'errors' => array($errors),
				'user_data' => new ArrayObject(),
				'income_data' => array()
			);
		}

		return $response;
	}

	function autoLogin()
	{
		$response = array();
		$user_data = array();
		$income_data = array();
		$errors = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['device_id', 'timemap', 'value']);

		if ($this->validator->validate()) {
			$device = $_POST['device_id'];

			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $device);

			$secure = $securityObj->securityChecker();
			if ($secure) {
				if ($this->checkExists('deviceId', 'checks', $_POST['device_id']) > 0) {
					$query = "SELECT userid FROM checks WHERE deviceId='{$device}'";
					$result = $this->db_access->getRow($query);
					$reg_id = $result['userid'];

					list($user_data, $income_data) = $this->loginHelper($reg_id);

					$this->uplineRelationGenerate($reg_id);
				} else
					$errors['deviceId'] = 'No user exists for this device';
			} else
				$errors['validation'] = 'Validation Error';
		} else {
			foreach ($this->validator->errors() as $key => $value) {
				$errors[$key] = implode(', ', $value);
			}
		}

		$this->db_access = null;

		if (empty($errors)) {
			$response = array(
				'app_version' => '3',
				'status' => '1',
				'msg' => 'User Successfully Signed In',
				'errors' => $errors,
				'user_data' => $user_data,
				'income_data' => $income_data
			);
		} else {
			$response = array(
				'app_version' => '3',
				'status' => '0',
				'msg' => 'Error Occured',
				'errors' => array($errors),
				'user_data' => new ArrayObject(),
				'income_data' => array()
			);
		}

		return $response;
	}
	//add
	function transantion($email, $phonenumber)
	{
		$query = "SELECT count(id) FROM transanctions WHERE email='{$email}' AND phone='{$phonenumber}' AND transaction_status='Success'";
		return $this->db_access->getRowNum($query);
	}


	function registerUser()
	{
		$errors = array();
		$response = array();

		$cur_time = date('Y-m-d H:i:s');

		$reg_id = 0;

		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['sponsorid', 'email', 'password', 'country', 'phonenumber', 'name', 'latitude', 'longitude', 'device_id']);
		$this->validator->rule('integer', 'sponsorid');
		$this->validator->rule('lengthMax', 'name', 255);
		$this->validator->rule('email', 'email');
		$this->validator->rule('lengthMax', 'email', 255);
		$this->validator->rule('lengthMin', 'password', 6);
		$this->validator->rule('lengthMax', 'latitude', 256);
		$this->validator->rule('lengthMax', 'longitude', 256);
		$this->validator->rule('lengthMax', 'device_id', 256);


		if ($this->validator->validate()) {
			$unique_email = $this->checkExists('email', 'users', $_POST['email']);
			$sponsorid_valid = $this->checkExists('id', 'users', $_POST['sponsorid']);
			//add
			$transantionn = $this->transantion($_POST['email'], $_POST['phonenumber']);
			// $transantion = 0;

			if ($transantionn == 1) {
				$active = 1;
			} else {
				$active = 0;
			}


			if ($unique_email == 0 && $sponsorid_valid == 1) {
				$options = [
					'cost' => 10,
				];
				$safePass = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

				$fields = array(
					'name' => $_POST['name'],
					'email' => $_POST['email'],
					'password' => $safePass,
					'phonenumber' => $_POST['phonenumber'],
					'country' => $_POST['country'],
					'sponsorid' => $_POST['sponsorid'],
					'created_at' => $cur_time,
					'updated_at' => $cur_time,
					'active' => $active, //add
				);
				$query = "INSERT INTO users(name, email, password, phonenumber, country, sponsorid, created_at, updated_at, active) 
				VALUES(:name, :email, :password, :phonenumber, :country, :sponsorid, :created_at, :updated_at,:active)"; //add

				$reg_id = $this->db_access->register($query, $fields);
			} else {
				if ($unique_email == 1 && $sponsorid_valid == 0) {
					$errors['email'] = 'Email Address Already Exists, Login with your account.';
					$errors['sponsorid'] = 'Sponsor ID invalid. Try Again';
				} else if ($unique_email == 1)
					$errors['email'] = 'Email Address Already Exists, Login with your account.';
				else
					$errors['sponsorid'] = 'Sponsor ID invalid. Try Again';
			}
		} else {
			foreach ($this->validator->errors() as $key => $value) {
				$errors[$key] = implode(', ', $value);
			}
		}

		if ($reg_id == 0) {
			$errors['name'] = 'User Sign Up Failed. Try Again';
		} else {
			//Table Ranks
			$fields = "userid, rank, target_rank, created_at, updated_at";
			$values = "{$reg_id}, 'Member', 'Bronze', '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('ranks', $fields, $values);

			//Table Earning
			$fields = "userid, joining_income, referral_income, others_income, approved_income, created_at, updated_at";
			$values = "{$reg_id}, 1, 0, 0, 0, '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('earnings', $fields, $values);

			//Table UserDetails
			$fields = "userid, created_at, updated_at";
			$values = "{$reg_id}, '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('user_details', $fields, $values);

			//Table Level
			$fields = "userid, created_at, updated_at";
			$values = "{$reg_id}, '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('levels', $fields, $values);

			//Table TodaysUser
			$fields = "userid, created_at, updated_at";
			$values = "{$reg_id}, '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('todays_users', $fields, $values);

			//Table MonthsUser
			$fields = "userid, created_at, updated_at";
			$values = "{$reg_id}, '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('months_users', $fields, $values);

			//Table User Checks
			$device_id = $_POST['device_id'];
			$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude'];
			$fields = "userid, deviceId, latitude, longitude, created_at, updated_at";
			$values = "{$reg_id}, '{$device_id}', '{$latitude}', '{$longitude}', '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('checks', $fields, $values);

			//Table others_incomes
			$fields = "userid, created_at, updated_at";
			$values = "{$reg_id}, '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('others_incomes', $fields, $values);


			//Table today_others_incomes
			$fields = "userid, created_at, updated_at";
			$values = "{$reg_id}, '{$cur_time}', '{$cur_time}'";
			$this->db_access->postNew('today_others_incomes', $fields, $values);

			//Table Ad Valley Impression
			$fields = "userid";
			$values = "{$reg_id}";
			$this->db_access->postNew("ad_valley_impression", $fields, $values);

			//Table Upline Relation
			$this->uplineRelationGenerate($reg_id);

			$level1 = 0;
			$level2 = 0;
			$level3 = 0;
			$level4 = 0;
			$level5 = 0;
			$level6 = 0;
			$level7 = 0;
			$level8 = 0;
			$level9 = 0;


			if ($_POST['sponsorid'] != '') {
				$level1 = $this->registerhelper->uplineTableUpdate($_POST['sponsorid'], 1);
			}

			if ($level1 != 0) {
				$level2 = $this->registerhelper->uplineTableUpdate($level1, 2);
			}
			if ($level2 != 0) {
				$level3 = $this->registerhelper->uplineTableUpdate($level2, 3);
			}
			if ($level3 != 0) {
				$level4 = $this->registerhelper->uplineTableUpdate($level3, 4);
			}
			if ($level4 != 0) {
				$level5 = $this->registerhelper->uplineTableUpdate($level4, 5);
			}
			if ($level5 != 0) {
				$level6 = $this->registerhelper->uplineTableUpdate($level5, 6);
			}
			if ($level6 != 0) {
				$level7 = $this->registerhelper->uplineTableUpdate($level6, 7);
			}
			if ($level7 != 0) {
				$level8 = $this->registerhelper->uplineTableUpdate($level7, 8);
			}

			if ($level8 != 0) {
				$level9 = $this->registerhelper->uplineTableUpdate($level8, 9);
			}
			if ($level9 != 0) {
				$level10 = $this->registerhelper->uplineTableUpdate($level9, 10);
			}
		}

		if (empty($errors)) {

			$todayQ = "SELECT * FROM today_others_incomes WHERE userid={$reg_id}";
			$todays_icome = $this->db_access->getRow($todayQ);

			$othersQ = "SELECT * FROM others_incomes WHERE userid={$reg_id}";
			$other_income = $this->db_access->getRow($othersQ);

			$user_data = array(
				'user_name' => $_POST['name'],
				'user_id' => $reg_id,
				'referral_income' => number_format(0, 6),
				'other_income' => number_format(1, 6)
			);

			$income_data = array(
				array(
					'field_name' => 'Referrals',
					'todays_icome' => $todays_icome['referrals'] == NULL ? number_format(0, 6) : $todays_icome['referrals'],
					'total_income' => $other_income['referrals'] == NULL ? number_format(0, 6) : $other_income['referrals']
				),
				array(
					'field_name' => 'Add Valley',
					'todays_icome' => $todays_icome['add_valley'] == NULL ? number_format(0, 6) : $todays_icome['add_valley'],
					'total_income' => $other_income['add_valley'] == NULL ? number_format(0, 6) : $other_income['add_valley']
				),
				array(
					'field_name' => 'Income Valley',
					'todays_icome' => $todays_icome['income_valley'] == NULL ? number_format(0, 6) : $todays_icome['income_valley'],
					'total_income' => $other_income['income_valley'] == NULL ? number_format(0, 6) : $other_income['income_valley']
				),
				array(
					'field_name' => 'Earn More',
					'todays_icome' => $todays_icome['earn_more'] == NULL ? number_format(0, 6) : $todays_icome['earn_more'],
					'total_income' => $other_income['earn_more'] == NULL ? number_format(0, 6) : $other_income['earn_more']
				),
				array(
					'field_name' => 'Shopping',
					'todays_icome' => $todays_icome['shopping'] == NULL ? number_format(0, 6) : $todays_icome['shopping'],
					'total_income' => $other_income['shopping'] == NULL ? number_format(0, 6) : $other_income['shopping']
				),
				array(
					'field_name' => 'Media & Social',
					'todays_icome' => $todays_icome['media_and_social'] == NULL ? number_format(0, 6) : $todays_icome['media_and_social'],
					'total_income' => $other_income['media_and_social'] == NULL ? number_format(0, 6) : $other_income['media_and_social']
				),
				array(
					'field_name' => 'Microworks',
					'todays_icome' => $todays_icome['weekly_bonus'] == NULL ? number_format(0, 6) : $todays_icome['weekly_bonus'],
					'total_income' => $other_income['weekly_bonus'] == NULL ? number_format(0, 6) : $other_income['weekly_bonus']
				),
				array(
					'field_name' => 'RP Income',
					'todays_icome' => $todays_icome['share'] == NULL ? number_format(0, 6) : $todays_icome['share'],
					'total_income' => $other_income['share'] == NULL ? number_format(0, 6) : $other_income['share']
				),
				array(
					'field_name' => 'Rank Bonus',
					'todays_icome' => $todays_icome['rank_bonus'] == NULL ? number_format(0, 6) : $other_income['rank_bonus'],
					'total_income' => $other_income['rank_bonus'] == NULL ? number_format(0, 6) : $other_income['rank_bonus']
				),
				array(
					'field_name' => 'Total Earning',
					'todays_icome' => number_format(1, 6),
					'total_income' => number_format(1, 6)
				)
			);

			$response = array(
				'status' => '1',
				'msg' => 'User Successfully Signed Up',
				'errors' => $errors,
				'user_data' => $user_data,
				'income_data' => $income_data
			);
		} else {
			$response = array(
				'status' => '0',
				'msg' => 'Error Occured',
				'errors' => array($errors),
				'user_data' => new ArrayObject(),
				'income_data' => array()
			);
		}

		$this->db_access = null;

		return $response;
	}

	//This will clone all user to Ad Valley Impression Table
	// function userIdClone()
	// {
	// 	$query = "SELECT id from users order by id LIMIT 60000 OFFSET 300000";
	// 	$field = array();
	// 	$results = $this->db_access->getData($query,$field);
	// 	foreach ($results as $result) 
	// 	{
	// 		$reg_id = $result->id;
	// 		//echo $reg_id;
	// 		$fields = "userid";
	// 		$values = "{$reg_id}";
	// 		$this->db_access->postNew("ad_valley_impression", $fields, $values);
	// 	}
	// }



}
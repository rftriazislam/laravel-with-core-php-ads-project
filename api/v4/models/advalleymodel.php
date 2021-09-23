<?php

require_once('../../dbaccess.php');
require_once('../../validator/vendor/autoload.php');
require_once('../helpers/securityhelper.php');

class AdvalleyModel
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
	}

	function showData($var)
	{
		echo '<pre>';print_r($var);echo '</pre>';
	}

	function loadWithdrawData()
	{
		$withdraw_data_final = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'device_id', 'timemap', 'value']);
		$this->validator->rule('integer', 'userid');
		
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			
			if( $securityObj->securityChecker() )
			{
				$userid = $_POST['userid'];

				$impression_q = "SELECT * FROM ad_valley_impression WHERE userid={$userid} LIMIT 1";
				$impression = $this->db_access->getRowObject($impression_q);

				$amount_q = "SELECT * FROM advalley_amount ORDER BY gad DESC LIMIT 1";
				$amount = $this->db_access->getRowObject($amount_q);

				$others_q = "SELECT * FROM others_incomes WHERE userid={$userid} LIMIT 1";
				$others_incomes = $this->db_access->getRowObject($others_q);

				$total_q = "SELECT SUM(passback_count) as total FROM microworks WHERE userid={$userid}";
				$total = $this->db_access->getRowObject($total_q);

				$micro = $total->total * 0.000400;


	         
			
			  	$adValleytotalgoogleads = $impression->selfgoogle_ad * $amount->gad + 
									$impression->lv1google_ad * $amount->gad*.4 +
									$impression->lv2google_ad * $amount->gad*.1 +
									$impression->lv3google_ad * $amount->gad*.1 +
									$impression->lv4google_ad * $amount->gad*.1 +
									$impression->lv5google_ad * $amount->gad*.05 +
									$impression->lv6google_ad * $amount->gad*.05 +
									$impression->lv7google_ad * $amount->gad*.05 +
									$impression->lv8google_ad * $amount->gad*.05 +
									$impression->lv9google_ad * $amount->gad*.05 +
									$impression->lv10google_ad * $amount->gad*.05;
									
									
				$adValleytotaldreamployads = $impression->selfdreamploy_ad * $amount->dad + 
									$impression->lv1dreamploy_ad * $amount->dad*.4 +
									$impression->lv2dreamploy_ad * $amount->dad*.1 +
									$impression->lv3dreamploy_ad * $amount->dad*.1 +
									$impression->lv4dreamploy_ad * $amount->dad*.1 +
									$impression->lv5dreamploy_ad * $amount->dad*.05 +
									$impression->lv6dreamploy_ad * $amount->dad*.05 +
									$impression->lv7dreamploy_ad * $amount->dad*.05 +
									$impression->lv8dreamploy_ad * $amount->dad*.05 +
									$impression->lv9dreamploy_ad * $amount->dad*.05 +
									$impression->lv10dreamploy_ad * $amount->dad*.05;		
									
				$adValleytotalvideoads = $impression->selfvideo_ad * $amount->gad + 
									$impression->lv1video_ad * $amount->vad*.4 +
									$impression->lv2video_ad * $amount->vad*.1 +
									$impression->lv3video_ad * $amount->vad*.1 +
									$impression->lv4video_ad * $amount->vad*.1 +
									$impression->lv5video_ad * $amount->vad*.05 +
									$impression->lv6video_ad * $amount->vad*.05 +
									$impression->lv7video_ad * $amount->vad*.05 +
									$impression->lv8video_ad * $amount->vad*.05 +
									$impression->lv9video_ad * $amount->vad*.05 +
									$impression->lv10video_ad * $amount->vad*.05;

				$balance_q = "SELECT * FROM earnings WHERE userid={$userid} LIMIT 1";
				$balance = $this->db_access->getRowObject($balance_q);
			 	

			 	$rpincome_q = "SELECT * FROM earnings WHERE userid={$userid} LIMIT 1";
				$rpincome = $this->db_access->getRowObject($rpincome_q);
	        
				$withdraw_q = "SELECT SUM(amount) as total_withdraw FROM withdraw WHERE userid={$userid}";
				$withdraw_data = $this->db_access->getRowObject($withdraw_q);

				$withdraw = $withdraw_data->total_withdraw;
				if( $withdraw == null )
					$withdraw = 0;


				$rpincome_final = number_format( $rpincome->rpincome+$rpincome->add_rpincome, 6 );

				$others_final = number_format( ( $adValleytotalgoogleads + $others_incomes->media_and_social + $micro + $others_incomes->income_valley + 1 )- $withdraw, 6);

				$level1_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level1={$userid} AND users.active='1'";
				$level1active = $this->db_access->getRowNumber($level1_q);

				$level2_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level2={$userid} AND users.active='1'";
				$level2active = $this->db_access->getRowNumber($level2_q);

				$level3_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level3={$userid} AND users.active='1'";
				$level3active = $this->db_access->getRowNumber($level3_q);

				$level4_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level4={$userid} AND users.active='1'";
				$level4active = $this->db_access->getRowNumber($level4_q);

				$level5_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level5={$userid} AND users.active='1'";
				$level5active = $this->db_access->getRowNumber($level5_q);

				$level6_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level6={$userid} AND users.active='1'";
				$level6active = $this->db_access->getRowNumber($level6_q);

				$level7_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level7={$userid} AND users.active='1'";
				$level7active = $this->db_access->getRowNumber($level7_q);

				$level8_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level8={$userid} AND users.active='1'";
				$level8active = $this->db_access->getRowNumber($level8_q);

				$level9_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level9={$userid} AND users.active='1'";
				$level9active = $this->db_access->getRowNumber($level9_q);

				$level10_q = "SELECT name FROM users JOIN upline_level ON users.id=upline_level.userid WHERE upline_level.level10={$userid} AND users.active='1'";
				$level10active = $this->db_access->getRowNumber($level10_q);


				$approveLevel1 = $level1active * 0.15555;
				$approveLevel2 = $level2active * 0.03888;
				$approveLevel3 = $level3active * 0.03888;
				$approveLevel4 = $level4active * 0.03888;
				$approveLevel5 = $level5active * 0.01944;
				$approveLevel6 = $level6active * 0.01944;
				$approveLevel7 = $level7active * 0.01944;
				$approveLevel8 = $level8active * 0.01944;
				$approveLevel9 = $level9active * 0.01944;
				$approveLevel10 = $level10active * 0.01944;
				
				$approveMediaTotal = $approveLevel1 + $approveLevel2 + $approveLevel3 + $approveLevel4 + $approveLevel5 + $approveLevel6 + $approveLevel7 + $approveLevel8 + $approveLevel9 + $approveLevel10;

				$withdraw_data_final = array(
					'referral_income' => number_format( $approveMediaTotal, 6),
					'other_income'=> $others_final,
					'rp_income' => $rpincome_final
					);
			}
			else
				$this->errors['validation'] = "Validation Error";
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
			'user_data'=>empty($this->errors) ? $withdraw_data_final : new ArrayObject()
			);
		return $output;
	}

	function advalleyBoard()
	{
		$income = array();
		$valley_data = array();
		$level1_percent = number_format(0.388888*(40/100),6);
        $level2_4_percent = number_format(0.388888*(10/100),6);
        $level5_10_percent = number_format(0.388888*(5/100),6);

		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'colony', 'admob', 'device_id', 'timemap', 'value']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'colony');
		$this->validator->rule('integer', 'admob');
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			if( $securityObj->securityChecker() )
			{
				$id = $_POST['userid'];
				$colony = $_POST['colony'];
				$admob = $_POST['admob'];
				
				if( $colony == 1 )
				{
					$this->adColonyRewards($id);
				}

				if( $admob == 1 )
				{
					$this->googleAdRewards($id);
				}

				$query = "SELECT * FROM ad_valley_impression WHERE userid={$id}";
				$result = $this->db_access->getRow($query);

				$init['column'] = 'Self';
				$init['google_impression'] = $result['selfgoogle_ad'];
				$init['dreamploy_impression'] = $result['selfdreamploy_ad'];
				$init['video_impression'] = $result['selfvideo_ad'];

				$valley_data[] = $init;

				for ($i= 1; $i <= 10 ; $i++) 
				{ 
					$linit = array();
					if($i == 10)
						$linit['column'] = 'G - '.$i;
					else
						$linit['column'] = 'G - 0'.$i;
					$gkey = 'lvl'.$i.'google_ad';
					$dkey = 'lvl'.$i.'dreamploy_ad';
					$vkey = 'lvl'.$i.'video_ad';
					$linit['google_impression'] = 0;
					$linit['dreamploy_impression'] = 0;
					$linit['video_impression'] = 0;
					
					$valley_data[] = $linit;
				}

				$income = array(
					'self_google_ad'=> '0.000200',
					'self_dreamploy_ad' => '0.000200',
					'self_video_ad'=>'0.001000',
					'level1_google_ad'=>number_format(0.000100*(40/100),6),
					'level1_dreamploy_ad'=>number_format(0.000200*(40/100),6),
					'level1_video_ad'=>number_format(0.000100*(40/100),6),
					'level2_4_google_ad'=>number_format(0.000100*(10/100),6),
					'level2_4_dreamploy_ad'=>number_format(0.000200*(10/100),6),
					'level2_4_video_ad'=>number_format(0.000100*(10/100),6),
					'level5_10_google_ad'=>number_format(0.000100*(5/100),6),
					'level5_10_dreamploy_ad'=>number_format(0.000200*(5/100),6),
					'level5_10_video_ad'=>number_format(0.000100*(5/100),6)
					);

			}
			else
				$this->errors['validation'] = "Validation Error";
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
			'earning' => empty($this->errors) ? $income : new ArrayObject(),
			'user_data'=>empty($this->errors) ? $valley_data : array()
			);
		return $output;

	}

	function updateDreamployVideoEarning()
	{
		$msg = "";
		$status = "1";
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'dvideo_id', 'device_id', 'timemap', 'value' ]);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'dvideo_id');
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			if( $securityObj->securityChecker() )
			{
				$work_id = $_POST['dvideo_id'];
				$userid = $_POST['userid'];
				$serviceQ = "SELECT * FROM advertiser_services WHERE id={$work_id}";
				$serviceRow = $this->db_access->getRowObject($serviceQ);

				$amount = $serviceRow->amount;
				$total_hit = $serviceRow->total_hit+1;

				//First Update Tracker
				$trackerFields = "work_id, user_id, amount";
				$trackerValues = "{$work_id}, '{$userid}', '{$amount}'";
				$this->db_access->postNew('advertiserservice_tracers', $trackerFields, $trackerValues);
				if( $total_hit == $serviceRow->impression )
					$serviceUpdateQ = "UPDATE advertiser_services SET `total_hit`={$total_hit}, status=0 WHERE id={$work_id}";
				else
					$serviceUpdateQ = "UPDATE advertiser_services SET `total_hit`={$total_hit} WHERE id={$work_id}";

				if( $this->db_access->postData($serviceUpdateQ, array()) == 'successfull' )
				{
					//Update Self D Ad Impression
					$selfQ = "UPDATE ad_valley_impression SET selfdreamploy_ad=(selfdreamploy_ad+1) WHERE userid={$userid}";
					
					if( $this->db_access->postData( $selfQ, array() ) == 'successfull')
					{
						// $getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userid}";
						// $uplineResult = $this->db_access->getRowObject($getUpline);
						// $uplinesData = explode(',', $uplineResult->upline_users);
						// foreach ($uplinesData as $uplineData) 
						// {
						// 	$sponsorData = explode('->', $uplineData);
						// 	$sponsorid = trim($sponsorData[0]);
						// 	$level = trim($sponsorData[1]);

						// 	$columnName = 'lvl'.$level.'dreamploy_ad';
						// 	$impression = $columnName."+1";
						// 	$sponsorUpdateQ = "UPDATE ad_valley_impression SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
						// 	if( $this->db_access->postData($sponsorUpdateQ, array() )!= 'successfull')
						// 	{
						// 		$msg = "Error Updating Level ".$level;
						// 		$status = "0";
						// 	}

						// }
						// if( $msg == "" ){
						// 	$msg = "Successfully Updated";	
						// }
					}
					else
					{
						$status = "0";
						$msg = "Own Data Update Error";
					}
					
				}
				else
				{
					$status = "0";
					$msg = "Data Update Error";
				}
			}
			else
				$this->errors['validation'] = "Validation Error";
		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$msg .= implode(', ', $value).', ';
			}
			$msg = substr($msg, 0, -2);
			$status = "0";
		}
		
		$this->db_access = null;
		
		$output = array(
			'status'=> $status,
			'msg'=> $msg
			);
		return $output;
	}

	function showAds()
	{
		$ads = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');
		if( $this->validator->validate() )
		{
			$userid = $_POST['userid'];
			$admob = $_POST['admob'];

			if( $admob == 1 )
			{
				$this->googleAdRewards($userid);
			}

			$query = "SELECT id, title, link FROM advertiser_services WHERE category='Video_ad' AND status='1'";
			
			foreach ($this->db_access->getData($query, $ads) as $result) 
			{
				$work_id = $result->id;

				$checkerQ = "SELECT count(id) FROM advertiserservice_tracers WHERE work_id={$work_id} AND user_id={$userid}";
				$rowNumber = $this->db_access->getRowNum($checkerQ);
				if( $rowNumber > 0 )
				{}
				else
				{
					$ads[] = $result;
				}
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
			'videoads'=> empty($this->errors) ? $ads : array()
			);
		return $output;
	}

	function updateVideoAd()
	{
		$status = "1";
		$msg = "Success";
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'device_id', 'timemap', 'value']);
		$this->validator->rule('integer', 'userid');
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			if( $securityObj->securityChecker() )
			{
				$id = $_POST['userid'];
				$this->adColonyRewards($id);
			}
			else
			{
				$status = "0";
				$msg = "Security Error";
			}
		}
		else
		{
			$status = "0";
			$msg = "Validation Error";
		}

		$output = array(
			'status'=> $status,
			'msg'=> $msg
			);
		return $output;

	}


	function updateGameDownload()
	{
		$status = "1";
		$msg = "Success";
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'device_id', 'timemap', 'value']);
		$this->validator->rule('integer', 'userid');
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			if( $securityObj->securityChecker() )
			{
				$id = $_POST['userid'];
				$this->gameDownloadReward($id);
			}
			else
			{
				$status = "0";
				$msg = "Security Error";
			}
		}
		else
		{
			$status = "0";
			$msg = "Validation Error";
		}

		$output = array(
			'status'=> $status,
			'msg'=> $msg
			);
		return $output;

	}

	function gameDownloadReward($userId)
	{
		$my_income = "selfdownload_survey+0.010";

		//INSERT USER IF NOT ALREADY IN INCOME_VALLEY TABLE
		$query = "INSERT IGNORE INTO income_valley SET userid=".$userId;
		$this->db_access->postData($query, array());

		//Update Self D Ad Impression
		$selfQ = "UPDATE income_valley SET selfdownload_survey=(".$my_income.") WHERE userid={$userId}";
		$this->db_access->postData($selfQ, array());

		$getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userId}";
		$uplineResult = $this->db_access->getRowObject($getUpline);
		
		$uplinesData = explode(',', $uplineResult->upline_users);

		$sponsorLevel = 1;
		if( !empty($uplineResult) )
		{
						
			foreach ($uplinesData as $uplineData) 
			{
				$sponsorData = explode('->', $uplineData);
				$sponsorid = trim($sponsorData[0]);
				$level = trim($sponsorData[1]);

				if( $sponsorid != null || $sponsorid != '' )
				{

					if( $sponsorLevel == 1 )
					{
						$sponsorAmount = number_format(0.010*(40/100),6);
					}
					elseif ( $sponsorLevel == 2 || $sponsorLevel == 3 || $sponsorLevel == 4) 
					{
						$sponsorAmount = number_format(0.010*(10/100),6);
					}
					else
					{
						$sponsorAmount = number_format(0.010*(5/100),6);
					}

					$columnName = 'lv'.$level.'download_survey';
					
					$impression = $columnName."+".$sponsorAmount;
					
					$sponsorUpdateQ = "UPDATE income_valley SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
					$this->db_access->postData($sponsorUpdateQ, array());

					$sponsorLevel++;
				}

			}
		}
	}

	function adColonyRewards($userid)
	{	
		// First Update Tracker
		$trackerFields = "work_id, user_id, amount";
		$trackerValues = "905577, '{$userid}', '1'";
		$this->db_access->postNew('advertiserservice_tracers', $trackerFields, $trackerValues);
		
		//Update Self D Ad Impression
		$selfQ = "UPDATE ad_valley_impression SET selfvideo_ad=(selfvideo_ad+1) WHERE userid={$userid}";
		$this->db_access->postData($selfQ, array());

		$getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userid}";
		$uplineResult = $this->db_access->getRowObject($getUpline);
		$uplinesData = explode(',', $uplineResult->upline_users);
		
		if (!empty($uplineResult))
		{
			foreach ($uplinesData as $uplineData) 
			{
				$sponsorData = explode('->', $uplineData);
				$sponsorid = trim($sponsorData[0]);
				$level = trim($sponsorData[1]);

				$columnName = 'lv'.$level.'video_ad';
				$impression = $columnName."+1";
				$sponsorUpdateQ = "UPDATE ad_valley_impression SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
				$this->db_access->postData($sponsorUpdateQ, array());
			}
		}
	}

	function submitWithdraw()
	{
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'device_id', 'timemap', 'value', 'method', 'amount', 'processor', 'account']);
		$this->validator->rule('integer', 'userid');
		
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			
			if( $securityObj->securityChecker() )
			{
				$userid = $_POST['userid'];
				$amount = $_POST['amount'];
				$account_type = $_POST['method'];
				$payment_processor = $_POST['processor'];
				$account_no = $_POST['account'];

				$cheker = "SELECT id FROM withdraw WHERE userid={$userid} AND status=0";
				if( $this->db_access->getRowNumber($cheker) > 0)
				{
					$output = array('status'=>'0', 'msg' =>'NOT PERMITTED0');
				}
				else
				{
					$fields = array(
						'userid'=>$userid,
						'account_type'=>$account_type,
						'amount'=>$amount,
						'payment_processor'=>$payment_processor,
						'account_no'=>$account_no,
						'status'=>0
						);
					
					$query = "INSERT INTO withdraw(userid, account_type, amount, payment_processor, account_no, status)
					VALUES(:userid, :account_type, :amount, :payment_processor, :account_no, :status)";
					if( $this->db_access->postData($query, $fields) == "successfull")
					{
						$output = array('status'=>'1', 'msg' =>'successfull');
					}
					else
					{
						$output = array('status'=>'0', 'msg' =>'NOT PERMITTED3');
					}
				}


			}
			else
			{
				$output = array('status'=>'0', 'msg' =>'NOT PERMITTED1');
			}
		}
		else
		{
			$output = array('status'=>'0', 'msg' =>'NOT PERMITTED2');
		}

		return $output;
	}

	function checkExists($field, $table, $value)
	{
		$query = "SELECT count(id) FROM {$table} WHERE {$field}='{$value}'";
		return $this->db_access->getRowNum($query);
	}


}
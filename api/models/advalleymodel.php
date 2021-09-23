<?php

require_once('../dbaccess.php');
require_once('../validator/vendor/autoload.php');
//require_once('../helpers/registerhelper.php');

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

	function loadWithdrawData()
	{
		$withdraw_data = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', 'userid');
		$this->validator->rule('integer', 'userid');
		if( $this->validator->validate() )
		{
			$userid = $_POST['userid'];
			$earningTableQ = "SELECT `referral_income`, (`joining_income`+`others_income`) AS other_incomes FROM `earnings` WHERE userid={$userid}";
			$earningTableData = $this->db_access->getRowObject($earningTableQ);

			$withdraw_data = array(
				'referral_income' => number_format($earningTableData->referral_income, 6),
				'other_income'=> number_format($earningTableData->other_incomes, 6),
				'total_earn' => number_format($earningTableData->other_incomes+$earningTableData->referral_income,6)
				);
		}	
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

		$output = array(
			'status'=> empty($this->errors) ? '1' : '0',
			'msg'=>empty($this->errors) ? 'Data Success' : 'Error Occured',
			'user_data'=>empty($this->errors) ? $withdraw_data : new ArrayObject()
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
		$this->validator->rule('required', ['userid', 'colony']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'colony');
		if( $this->validator->validate() )
		{
			$id = $_POST['userid'];
			$colony = $_POST['colony'];
			
			if( $colony == 1 )
			{
				$this->adColonyRewards($id);
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
				$linit['google_impression'] = $result[$gkey];
				$linit['dreamploy_impression'] = $result[$dkey];
				$linit['video_impression'] = $result[$vkey];
				$valley_data[] = $linit;
			}

			$income = array(
				'self_google_ad'=> '0.000100',
				'self_dreamploy_ad' => '0.000100',
				'self_video_ad'=>'0.000100',
				'level1_google_ad'=>number_format(0.000100*0.388888*(40/100),6),
				'level1_dreamploy_ad'=>number_format(0.000100*0.388888*(40/100),6),
				'level1_video_ad'=>number_format(0.000100*0.388888*(40/100),6),
				'level2_4_google_ad'=>number_format(0.000100*0.388888*(10/100),6),
				'level2_4_dreamploy_ad'=>number_format(0.000100*0.388888*(10/100),6),
				'level2_4_video_ad'=>number_format(0.000100*0.388888*(10/100),6),
				'level5_10_google_ad'=>number_format(0.000100*0.388888*(5/100),6),
				'level5_10_dreamploy_ad'=>number_format(0.000100*0.388888*(5/100),6),
				'level5_10_video_ad'=>number_format(0.000100*0.388888*(5/100),6)
				);
		}
		else
		{
			foreach ($this->validator->errors() as $key => $value) {
				$this->errors[$key] = implode(', ', $value);
			}
		}

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
		$this->validator->rule('required', ['userid', 'dvideo_id']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'dvideo_id');
		if( $this->validator->validate() )
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
					$getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userid}";
					$uplineResult = $this->db_access->getRowObject($getUpline);
					$uplinesData = explode(',', $uplineResult->upline_users);
					foreach ($uplinesData as $uplineData) 
					{
						$sponsorData = explode('->', $uplineData);
						$sponsorid = trim($sponsorData[0]);
						$level = trim($sponsorData[1]);

						$columnName = 'lvl'.$level.'dreamploy_ad';
						$impression = $columnName."+1";
						$sponsorUpdateQ = "UPDATE ad_valley_impression SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
						if( $this->db_access->postData($sponsorUpdateQ, array() )!= 'successfull')
						{
							$msg = "Error Updating Level ".$level;
							$status = "0";
						}

					}
					if( $msg == "" ){
						$msg = "Successfully Updated";	
					}
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
		{
			foreach ($this->validator->errors() as $key => $value) {
				$msg .= implode(', ', $value).', ';
			}
			$msg = substr($msg, 0, -2);
			$status = "0";
		}
		$output = array(
			'status'=> $status,
			'msg'=> $msg
			);
		return $output;
	}

	function checkExists($field, $table, $value)
	{
		$query = "SELECT count(id) FROM {$table} WHERE {$field}='{$value}'";
		return $this->db_access->getRowNum($query);
	}

	function showAds()
	{
		$ads = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', 'userid');
		$this->validator->rule('integer', 'userid');
		if( $this->validator->validate() )
		{
			$userid = $_POST['userid'];
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

		$output = array(
			'status'=> empty($this->errors) ? '1' : '0',
			'msg'=>empty($this->errors) ? 'Data Success' : 'Error Occured',
			'videoads'=> empty($this->errors) ? $ads : array()
			);
		return $output;
	}

	function adColonyRewards($userid)
	{	
		//First Update Tracker
		$trackerFields = "work_id, user_id, amount";
		$trackerValues = "905577, '{$userid}', '1'";
		$this->db_access->postNew('advertiserservice_tracers', $trackerFields, $trackerValues);
		
		//Update Self D Ad Impression
		$selfQ = "UPDATE ad_valley_impression SET selfvideo_ad=(selfvideo_ad+1) WHERE userid={$userid}";
		$this->db_access->postData($selfQ, array());

		$getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userid}";
		$uplineResult = $this->db_access->getRowObject($getUpline);
		$uplinesData = explode(',', $uplineResult->upline_users);
		foreach ($uplinesData as $uplineData) 
		{
			$sponsorData = explode('->', $uplineData);
			$sponsorid = trim($sponsorData[0]);
			$level = trim($sponsorData[1]);

			$columnName = 'lvl'.$level.'video_ad';
			$impression = $columnName."+1";
			$sponsorUpdateQ = "UPDATE ad_valley_impression SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
			$this->db_access->postData($sponsorUpdateQ, array());

		}
	}


}
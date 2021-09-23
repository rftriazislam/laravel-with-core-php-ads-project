<?php

require_once('../../dbaccess.php');
require_once('../../validator/vendor/autoload.php');
require_once('../helpers/securityhelper.php');

class IncomevalleyModel
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

	function mediaSocialBoard()
	{
		$mediasocial = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob', 'device_id', 'timemap', 'value']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			if( $securityObj->securityChecker() )
			{
				$id = $_POST['userid'];
			
				$admob = $_POST['admob'];

				if( $admob == 1 )
				{
					$this->googleAdRewards($id);
				}

				$query = "SELECT * FROM income_valley WHERE userid={$id}";
				$result = $this->db_access->getRow($query);

				$init['column'] = 'Self';
				$init['DT'] = number_format($result['selfdownload_survey'], 6);
				$init['DM'] = number_format($result['selfyoutube_blog'], 6);
				$init['NP'] = number_format($result['selfppd_wt'], 6);
				$init['SM'] = number_format($result['selfsignup'], 6);
				$init['SMP'] = number_format($result['selfsignup'], 6);

				$mediasocial[] = $init;

				for ($i= 1; $i <= 10 ; $i++) 
				{ 
					$linit = array();
					if($i == 10)
						$linit['column'] = 'G - '.$i;
					else
						$linit['column'] = 'G - 0'.$i;
					$dkey = 'lv'.$i.'download_survey';
					$ykey = 'lv'.$i.'youtube_blog';
					$pkey = 'lv'.$i.'ppd_wt';
					$skey = 'lv'.$i.'signup';
					$linit['DT'] = number_format($result[$dkey], 6);
					$linit['DM'] = number_format($result[$ykey], 6);
					$linit['NP'] = number_format($result[$pkey], 6);
					$linit['SM'] = number_format($result[$skey], 6);
					$linit['SMP'] = number_format($result[$skey], 6);
					$mediasocial[] = $linit;
				}
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
			'media_social' => empty($this->errors) ? $mediasocial : array()
			);
		return $output;



	}

	function earnMoreBoard()
	{
		$earnmore = array();
		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob', 'device_id', 'timemap', 'value']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			if( $securityObj->securityChecker() )
			{
				$id = $_POST['userid'];
			
				$admob = $_POST['admob'];

				if( $admob == 1 )
				{
					$this->googleAdRewards($id);
				}

				$query = "SELECT * FROM income_valley WHERE userid={$id}";
				$result = $this->db_access->getRow($query);

				$init['column'] = 'Self';
				$init['education'] = number_format($result['selfdownload_survey'], 6);
				$init['health'] = number_format($result['selfyoutube_blog'], 6);
				$init['tours'] = number_format($result['selfppd_wt'], 6);
				$init['travelling'] = number_format($result['selfsignup'], 6);

				$earnmore[] = $init;

				for ($i= 1; $i <= 10 ; $i++) 
				{ 
					$linit = array();
					if($i == 10)
						$linit['column'] = 'G - '.$i;
					else
						$linit['column'] = 'G - 0'.$i;
					$dkey = 'lv'.$i.'download_survey';
					$ykey = 'lv'.$i.'youtube_blog';
					$pkey = 'lv'.$i.'ppd_wt';
					$skey = 'lv'.$i.'signup';
					$linit['education'] = number_format($result[$dkey], 6);
					$linit['health'] = number_format($result[$ykey], 6);
					$linit['tours'] = number_format($result[$pkey], 6);
					$linit['travelling'] = number_format($result[$skey], 6);
					$earnmore[] = $linit;
				}
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
			'earn_more' => empty($this->errors) ? $earnmore : array()
			);
		return $output;



	}

	function googleAdRewards($userid)
	{
		//Update Self D Ad Impression
		//$selfQ = "UPDATE ad_valley_impression SET selfgoogle_ad=(selfgoogle_ad+1) WHERE userid={$userid}";
		//$this->db_access->postData($selfQ, array());
	}

	function incomevalleyBoard()
	{
		$income = array();
		$valley_data = array();

		$this->validator = new Valitron\Validator($_POST);
		$this->validator->rule('required', ['userid', 'admob', 'device_id', 'timemap', 'value']);
		$this->validator->rule('integer', 'userid');
		$this->validator->rule('integer', 'admob');
		if( $this->validator->validate() )
		{
			$securityObj = new SecurityHelper($_POST['timemap'], $_POST['value'], $_POST['device_id']);
			if( $securityObj->securityChecker() )
			{
				$id = $_POST['userid'];
			
				$admob = $_POST['admob'];

				if( $admob == 1 )
				{
					$this->googleAdRewards($id);
				}

				$query = "SELECT * FROM income_valley WHERE userid={$id}";
				$result = $this->db_access->getRow($query);

				$init['column'] = 'Self';
				$init['download_survey'] = number_format( $result['selfdownload_survey'], 6);
				$init['youtube_blog'] = number_format($result['selfyoutube_blog'], 6);
				$init['ppd_wt'] = number_format($result['selfppd_wt'], 6);
				$init['signup'] = number_format($result['selfsignup'], 6);

				$valley_data[] = $init;

				for ($i= 1; $i <= 10 ; $i++) 
				{ 
					$linit = array();
					if($i == 10)
						$linit['column'] = 'G - '.$i;
					else
						$linit['column'] = 'G - 0'.$i;
					$dkey = 'lv'.$i.'download_survey';
					$ykey = 'lv'.$i.'youtube_blog';
					$pkey = 'lv'.$i.'ppd_wt';
					$skey = 'lv'.$i.'signup';
					$linit['download_survey'] = (string) $result[$dkey];
					$linit['youtube_blog'] = number_format($result[$ykey], 6);
					$linit['ppd_wt'] = number_format($result[$pkey], 6);
					$linit['signup'] = number_format($result[$skey], 6);
					$valley_data[] = $linit;
				}

				$income = array(
					'self_download_survey'=> number_format(0.010, 6),
					'self_youtube_blog' => number_format(0.0002, 6),
					'self_ppd_wt'=>number_format(0.0005, 6),
					'self_signup'=>number_format(0.0005, 6),
					
					'level1_download_survey'=>number_format(0.000100*(40/100),6),
					'level1_youtube_blog'=>number_format(0.000200*(40/100),6),
					'level1_ppd_wt'=>number_format(0.000500*(40/100),6),
					'level1_signup'=>number_format(0.000500*(40/100),6),
					
					'level2_4_download_survey'=>number_format(0.000100*(10/100),6),
					'level2_4_youtube_blog'=>number_format(0.000200*(10/100),6),
					'level2_4_ppd_wt'=>number_format(0.000500*(10/100),6),
					'level2_4_signup'=>number_format(0.000500*(10/100),6),
					
					'level5_10_download_survey'=>number_format(0.000100*(5/100),6),
					'level5_10_youtube_blog'=>number_format(0.000200*(5/100),6),
					'level5_10_ppd_wt'=>number_format(0.000500*(5/100),6),
					'level5_10_signup'=>number_format(0.000500*(5/100),6)
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
}
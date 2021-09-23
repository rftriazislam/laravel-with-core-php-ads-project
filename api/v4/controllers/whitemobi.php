<?php

require_once('../../dbaccess.php');

// get the variables
$userId 			= $_GET['appUserId'];
$rewards 			= $_GET['rewards'];
$transactionId 		= $_GET['transactionId'];
$deviceId 			= $_GET['deviceId'];
$currency 			= $_GET['currency'];
$mode 				= $_GET['mode'];
$platform 			= $_GET['platform'];
$signature 			= $_GET['signature'];
$privateKey 		= '84fc5p3fhvlYBeMRt4dv5DNrb';

//header(http_response_code(200));



// validate the call using the signature
if ( sha1($transactionId . $userId . $rewards . $privateKey) != $signature ) {
      header(http_response_code(400));
      die();
}
else
{
	$db_access = Dbaccess::getDbAccess();
	$my_income = "selfdownload_survey+0.010";

	//INSERT USER IF NOT ALREADY IN INCOME_VALLEY TABLE
	$query = "INSERT IGNORE INTO income_valley SET userid={$userId}";
	$db_access->postData( $query, array() );

	//Update Self D Ad Impression
	$selfQ = "UPDATE income_valley SET selfdownload_survey=(".$my_income.") WHERE userid={$userId}";
	//echo $selfQ."<br/>";
	$db_access->postData($selfQ, array());

	$getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userId}";
	$uplineResult = $db_access->getRowObject($getUpline);
	$uplinesData = explode(',', $uplineResult->upline_users);

	$sponsorLevel = 1;
	if( !empty($uplineResult) )
	{
					
		foreach ($uplinesData as $uplineData) 
		{
			$sponsorData = explode('->', $uplineData);
			$sponsorid = trim($sponsorData[0]);
			$level = trim($sponsorData[1]);

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
			//echo $sponsorUpdateQ."<br/>";
			$db_access->postData($sponsorUpdateQ, array());

			$sponsorLevel++;

		}
	}

	header(http_response_code(200));
    die();
}

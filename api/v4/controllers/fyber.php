<?php

require_once('../../dbaccess.php');

// get the variables
$userId 						= $_GET['uid'];
$amount 						= $_GET['amount'];
$currency_name 					= $_GET['currency_name'];
$currency_id					= $_GET['currency_id'];
$signature 						= $_GET['sid'];
$privateKey 					= 'f08c71b5a593d72e8eeeda0aee91ee9a';

//header(http_response_code(200));



// validate the call using the signature
if ( sha1($privateKey . $userId . $amount ) != $signature ) {
      header(http_response_code(400));
      die();
}
else
{
	$db_access = Dbaccess::getDbAccess();
	$my_income = "selfsignup+".$amount;

	//INSERT USER IF NOT ALREADY IN INCOME_VALLEY TABLE
	$query = "INSERT IGNORE INTO income_valley SET userid={$userId}";
	$db_access->postData( $query, array() );

	//Update Self D Ad Impression
	$selfQ = "UPDATE income_valley SET selfsignup=(".$my_income.") WHERE userid={$userId}";
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
				$sponsorAmount = number_format($amount*(40/100),6);
			}
			elseif ( $sponsorLevel == 2 || $sponsorLevel == 3 || $sponsorLevel == 4) 
			{
				$sponsorAmount = number_format($amount*(10/100),6);
			}
			else
			{
				$sponsorAmount = number_format($amount*(5/100),6);
			}

			$columnName = 'lv'.$level.'signup';
			
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

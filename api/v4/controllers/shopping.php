<?php

require_once('../../dbaccess.php');

// get the variables
$userId 			= $_GET['userId'];
$purchase 			= $_GET['purchase'];
$transactionId 		= $_GET['transactionId'];

$signature 			= $_GET['signature'];
$privateKey 		= '84fc5p3fhvlYBeMRt4dv5DNrb';

//header(http_response_code(200));

//echo sha1($transactionId . $userId . $purchase . $privateKey); exit();



// validate the call using the signature
if ( sha1($transactionId . $userId . $purchase . $privateKey) != $signature ) {
	$json = array( 'msg' => 'Wrong Validation', 'status' => '400' );
}else
{
	$db_access = Dbaccess::getDbAccess();
	$amount = $purchase * 0.010;
	$my_income = "selfshopping+".$amount;

	//INSERT USER IF NOT ALREADY IN INCOME_VALLEY TABLE
	$query = "INSERT IGNORE INTO shopping SET userid={$userId}";
	$db_access->postData( $query, array() );

	//Update Self D Ad Impression
	$selfQ = "UPDATE shopping SET selfshopping=(".$my_income.") WHERE userid={$userId}";
	//echo $selfQ."<br/>";exit();
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

			$sp_add_query = "INSERT IGNORE INTO shopping SET userid={$sponsorid}";
			$db_access->postData( $sp_add_query, array() );

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

			$columnName = 'lv'.$level.'shopping';
			
			$impression = $columnName."+".$sponsorAmount;
			
			$sponsorUpdateQ = "UPDATE shopping SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
			//echo $sponsorUpdateQ."<br/>";
			$db_access->postData($sponsorUpdateQ, array());

			$sponsorLevel++;

		}
	}

	// header(http_response_code(200));
 //    die();
	$json = array( 'msg' => 'Successful', 'status' => '200' );
}

echo json_encode($json);

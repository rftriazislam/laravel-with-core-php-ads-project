<?php
// TrialPay provides this signature for the message
// Note: The actual HTTP header is "TrialPay-HMAC-MD5",
// but PHP renames all HTTP headers so we end up with:
$message_signature = $_SERVER['HTTP_TRIALPAY_HMAC_MD5'];

// Recalculate the signature locally
$key = '695aa9aaf4';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 // the following is for POST notification
 if (empty($HTTP_RAW_POST_DATA)) {
 	$recalculated_message_signature = hash_hmac('md5', file_get_contents('php://input'), $key);
 } else {
 	$recalculated_message_signature = hash_hmac('md5', $HTTP_RAW_POST_DATA, $key);
 }

} else {
 // the following is for GET notification
 $recalculated_message_signature = hash_hmac('md5', $_SERVER['QUERY_STRING'], $key);

}

if ($message_signature == $recalculated_message_signature) {
	
	// require_once('../../dbaccess.php');

	// $db_access = Dbaccess::getDbAccess();
	// $my_income = "selfdownload_survey+0.001";

	// $userid = $_POST['userid'];
	// $userId = $_POST['sid'];

	// //INSERT USER IF NOT ALREADY IN INCOME_VALLEY TABLE
	// $query = "INSERT IGNORE INTO income_valley SET userid={$userId}";
	// $db_access->postData( $query, array() );

	// //Update Self D Ad Impression
	// $selfQ = "UPDATE income_valley SET selfdownload_survey=(".$my_income.") WHERE userid={$userId}";
	// //echo $selfQ."<br/>";
	// $db_access->postData($selfQ, array());

	// $getUpline = "SELECT upline_users FROM user_upline WHERE userid={$userId}";
	// $uplineResult = $db_access->getRowObject($getUpline);
	// $uplinesData = explode(',', $uplineResult->upline_users);

	// $sponsorLevel = 1;
	// if( !empty($uplineResult) )
	// {
					
	// 	foreach ($uplinesData as $uplineData) 
	// 	{
	// 		$sponsorData = explode('->', $uplineData);
	// 		$sponsorid = trim($sponsorData[0]);
	// 		$level = trim($sponsorData[1]);

	// 		if( $sponsorLevel == 1 )
	// 		{
	// 			$sponsorAmount = number_format(0.001*(40/100),6);
	// 		}
	// 		elseif ( $sponsorLevel == 2 || $sponsorLevel == 3 || $sponsorLevel == 4) 
	// 		{
	// 			$sponsorAmount = number_format(0.001*(10/100),6);
	// 		}
	// 		else
	// 		{
	// 			$sponsorAmount = number_format(0.001*(5/100),6);
	// 		}

	// 		$columnName = 'lv'.$level.'download_survey';
			
	// 		$impression = $columnName."+".$sponsorAmount;
			
	// 		$sponsorUpdateQ = "UPDATE income_valley SET ".$columnName."=(".$impression.") WHERE userid={$sponsorid}";
	// 		//echo $sponsorUpdateQ."<br/>";
	// 		$db_access->postData($sponsorUpdateQ, array());

	// 		$sponsorLevel++;

	// 	}
	// }
	
    header_remove();
    // set the actual code
    http_response_code(200);

    header('Status: 200 OK');

    echo 1;

} else {
 	// clear the old headers
    header_remove();
    // set the actual code
    http_response_code(400);

    header('Status: 400 Bad Request');

    echo 'AUTHENTICATION FAILURE';
}
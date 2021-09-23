<?php

// Route::get('/update_earnings_re-rz', 'HomeController@update_earnings_re');



Route::get('test-down-level', function () {
	$count1 = DB::table('upline_level')->where('level1', 887782)->get();
	$count2 = DB::table('upline_level')->where('level2', 887782)->count();
	$count3 = DB::table('upline_level')->where('level3', 887782)->count();
	$count4 = DB::table('upline_level')->where('level4', 887782)->count();
	$count5 = DB::table('upline_level')->where('level5', 887782)->count();
	$count6 = DB::table('upline_level')->where('level6', 887782)->count();
	$count7 = DB::table('upline_level')->where('level7', 887782)->count();
	$count8 = DB::table('upline_level')->where('level8', 887782)->count();
	$count9 = DB::table('upline_level')->where('level9', 887782)->count();
	$count10 = DB::table('upline_level')->where('level10', 887782)->count();
	dd($count1);
});


Route::get('/', 'frontEnd\HomeController@index');

Route::get('/our-service', 'frontEnd\HomeController@ourService');

Route::get('/marketing-plan', 'frontEnd\HomeController@marketingPlan');
Route::get('/marketing-plan-signup', 'frontEnd\HomeController@planSignup');
Route::get('marketing-plan-withdraw', 'frontEnd\HomeController@planWithdraw');
Route::get('marketing-plan-chart', 'frontEnd\HomeController@planComChart');
Route::get('marketing-plan-chart', 'frontEnd\HomeController@planComChart');
Route::get('marketing-plan-activation', 'frontEnd\HomeController@planComActivation');
Route::get('marketing-plan-orbit', 'frontEnd\HomeController@planComOrbit');
Route::get('marketing-plan-captcha', 'frontEnd\HomeController@planComCaptcha');
Route::get('marketing-plan-unistag', 'frontEnd\HomeController@planComUnistag');
Route::get('marketing-plan-youtube', 'frontEnd\HomeController@planComYoutube');
Route::get('marketing-plan-video', 'frontEnd\HomeController@planComVideo');
Route::get('marketing-plan-facebook', 'frontEnd\HomeController@planComFacebooko');

Route::get('marketing-plan-fbgroup', 'frontEnd\HomeController@planComFbGroup');
Route::get('marketing-plan-youtube-channel', 'frontEnd\HomeController@planComYoutubeChan');
Route::get('marketing-plan-whatsapp', 'frontEnd\HomeController@planComWhatsApp');
Route::get('marketing-plan-hotline', 'frontEnd\HomeController@planComHotLine');

Route::get('terms-and-condition', function () {
	return view('frontEnd.service.termsCondition');
});




Route::get('/tutorial', 'frontEnd\HomeController@tutorial');
Route::get('/blog', 'frontEnd\HomeController@blogView');
Route::get('/youtube', 'frontEnd\HomeController@youtubeView');
Route::get('/blog-youtube', 'frontEnd\HomeController@blogYoutubeCount');
Route::get('/ppd-count', 'frontEnd\HomeController@PpdCount');
Route::get('/ad-valley-insert', 'frontEnd\HomeController@adValleyCron');
Route::get('/marchent', 'frontEnd\MarchentController@registerForm');
Route::post('/marchent-register', 'frontEnd\MarchentController@register');
Route::post('/user-login-api', 'frontEnd\HomeController@getUsersDetails');
Route::post('/postback/conversion', 'frontEnd\ApiController@postBackCPA');
Route::get('/shopping/{userid}/{amount}', 'ApiController@shoppingCalculation');
Route::get('/test-details', 'ApiController@testAll');
Route::get('/rank-update', 'frontEnd\RankController@updateRank');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/email-marketing', 'HomeController@email_marketing');
Route::post('/save-email', 'HomeController@save_email')->name('save_email');
// payment 
Route::get('/payment_issue_apps', 'payment\PaymentController@payment_issue')->name('payment_issue_apps');

Route::get('/app-chat', 'payment\PaymentController@chat');



//
Route::group(['middleware' => 'PublisherMiddleware'], function () {
	/*Team Managment*/
	Route::get('/my-team/{level}/{id}', 'frontEnd\MyteamController@showTeam');
	/* Dashboard */
	Route::get('/dashboard', 'frontEnd\DashboardController@showDashboard');
	/*My profile*/
	Route::get('/my-profile', 'frontEnd\UserDetailsController@index');
	Route::post('/check-profile', 'frontEnd\UserDetailsController@checkProfile');
	Route::get('/profile', 'frontEnd\UserDetailsController@showProfile');
	Route::post('/update-profile', 'frontEnd\UserDetailsController@updateProfile');

	/*Hotlist*/
	Route::get('/hotlist', 'frontEnd\HotlistController@index');
	Route::get('/insert-upline', 'HomeController@insertUplevel');

	/*Rank*/
	Route::get('/rank', 'frontEnd\RankController@index');
	/*Goal*/
	Route::get('/goal', 'frontEnd\HomeController@goal');
	/*Upline*/
	Route::get('/upline', 'frontEnd\HomeController@uplineAll');
	/*Income Valley*/
	Route::get('/income-valley', 'frontEnd\HomeController@incomeValley');
	Route::get('/web-traffic', 'frontEnd\HomeController@webTraffic');
	Route::get('/station-two', 'frontEnd\HomeController@stationTwo');
	Route::get('/station-three', 'frontEnd\HomeController@stationThree');
	/*PPD*/
	Route::get('/ppd', 'frontEnd\PpdController@ppd');
	Route::get('/ppd/{ppdname}', 'frontEnd\PpdController@ppdLinks');
	/*Earn More*/
	Route::get('/earn-more', 'frontEnd\HomeController@EarnMore');
	/*Media And Social*/
	Route::get('/media-social', 'frontEnd\HomeController@mediaSocial');

	/* microworks*/
	/*Media And Social*/
	Route::get('/microworks', 'frontEnd\HomeController@microWorks');
	Route::get('/video-add', 'frontEnd\HomeController@videoAdd');
	/*Ad Valley*/
	Route::get('/ad-valley', 'frontEnd\HomeController@adValley');
	Route::get('/apps-download', 'frontEnd\HomeController@appsDownlod');
	/*captcha*/
	/*Captcha*/
	Route::get('/captcha', 'frontEnd\HomeController@actionCaptcha');

	Route::post('/captcha-post', 'frontEnd\HomeController@postActionCaptcha');
	Route::post('/microworks-post', 'frontEnd\HomeController@postActionMicro');
	/*Withdraw*/
	Route::get('/withdraw', 'frontEnd\WithdrawController@index');

	Route::get('/withdraw-password', 'frontEnd\WithdrawController@passCheckAction');
	Route::post('/withdraw-post', 'frontEnd\WithdrawController@withdrawPostAction');
	Route::post('/withdraw-success', 'frontEnd\WithdrawController@withdrawSuccessAction');
	/*challenge*/
	Route::get('/challenge', 'frontEnd\HomeController@challangeAction');


	Route::get('account-activation', 'frontEnd\HomeController@accAct')->name('accAct');
	Route::post('account-activation', 'frontEnd\HomeController@postAccAct')->name('postAccAct');
});
Route::get('api-upline/{id}', 'DreamployApiController@uplineId');
function cal($user_id, $conn)
{

	try {

		//set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT count(likes) as total FROM `users_like` where dreamploy_id = '" . $user_id . "' LIMIT 1");
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["total"];

		// while($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
		// var_dump($result);
		// echo "<br>";
		// }
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
}
// function check(){

// }
Route::get('abc', function () {


	ini_set('memory_limit', '2048M');
	$users = [];
	$level1 = [];
	$level2 = [];
	$level3 = [];
	$level4 = [];
	$level5 = [];
	$level6 = [];
	$level7 = [];
	$level8 = [];
	$level9 = [];
	$level10 = [];

	$l1 = DB::table('upline_level')->where('level1', '400114')->get();
	$l2 = DB::table('upline_level')->where('level2', '400114')->get();
	$l3 = DB::table('upline_level')->where('level3', '400114')->get();
	$l4 = DB::table('upline_level')->where('level4', '400114')->get();
	$l5 = DB::table('upline_level')->where('level5', '400114')->get();
	$l6 = DB::table('upline_level')->where('level6', '400114')->get();
	$l7 = DB::table('upline_level')->where('level7', '400114')->get();
	$l8 = DB::table('upline_level')->where('level8', '400114')->get();
	$l9 = DB::table('upline_level')->where('level9', '400114')->get();
	$l10 = DB::table('upline_level')->where('level10', '400114')->get();
	echo '<pre>';
	foreach ($l1 as $l) {
		$level1[] = $l->userid;
	}
	echo '<br>';
	foreach ($l2 as $l) {
		$level2[] = $l->userid;
	}
	echo '<br>';
	foreach ($l3 as $l) {
		$level3[] = $l->userid;
	}
	echo '<br>';
	foreach ($l4 as $l) {
		$level4[] = $l->userid;
	}
	echo '<br>';
	foreach ($l5 as $l) {
		$level5[] = $l->userid;
	}
	echo '<br>';
	foreach ($l6 as $l) {
		$level6[] = $l->userid;
	}
	foreach ($l7 as $l) {
		$level7[] = $l->userid;
	}
	foreach ($l8 as $l) {
		$level8[] = $l->userid;
	}
	foreach ($l9 as $l) {
		$level9[] = $l->userid;
	}
	foreach ($l10 as $l) {
		$level10[] = $l->userid;
	}

	$conn = new PDO("mysql:host=127.0.0.1:8000;dbname=user@name", 'database', '');
	foreach ($level9 as $ll) {
		echo cal($ll, $conn) . '<br>';
	}
	//foreach($level10 as $lt){
	//echo '<pre>';
	//  echo $lt;
	//echo '</pre>';
	//admin_news
	// sssssaas
	//cal($lt,$conn);
	//}
	//cal('400114');
	//ini_set('memory_limit', '2048M');
	try {
		//$conn = new PDO("mysql:host=127.0.0.1:8000;dbname=use@name", 'database', '');
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully";
		$stmt = $conn->prepare("SELECT count(likes)as total FROM `users_like` where dreamploy_id = 400114;");
		$stmt->execute();
		echo "<pre>";
		var_dump($stmt->fetchAll(PDO::FETCH_ASSOC)[0]["total"]);
		while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
			//var_dump($result);
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	//echo file_get_contents('http://dreamploy.net/api-level/'.Auth::id());
});
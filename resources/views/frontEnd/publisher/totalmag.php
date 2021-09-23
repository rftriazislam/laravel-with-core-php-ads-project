<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Microworks;
require_once('app/Http/Controllers/frontEnd/HomeController.php');
require_once('app/Http/Controllers/frontEnd/EarningController.php');
require_once('app/Http/Controllers/HomeController.php');


			$impression = DB::table('ad_valley_impression')->where('userid', Auth::user()->id)->first();
        	$amount = DB::table('advalley_amount')->get()->max();
			
			$others_income = DB::table('others_incomes')->where('userid', Auth::user()->id)->first();
			$total = Microworks::where( 'userid', Auth::user()->id )->sum('passback_count');					
        	$micro = $total * 0.000400;
        	$rpincome = DB::table('earnings')->where('userid', Auth::user()->id)->first();
			
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
								
								$adValleytotalvideoads = $impression->selfvideo_ad * $amount->vad + 
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
$totalmag = $adValleytotalgoogleads + $adValleytotaldreamployads + $adValleytotalvideoads;
$totalEarningForRank = $totalmag + $others_income->income_valley+ $others_income->media_and_social+($rpincome->rpincome)+($rpincome->add_rpincome)+$micro;
?>
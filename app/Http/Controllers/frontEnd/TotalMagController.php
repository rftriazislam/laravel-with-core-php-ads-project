<?php
namespace App\Http\Controllers\FrontEnd;
use App\Earning;
use App\Http\Controllers\Controller;
use App\TodaysUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FrontEnd;


class TotalMagController extends Controller{
	   public function totalMag(){
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
$totalmag = $adValleytotalgoogleads + $adValleytotaldreamployads + $adValleytotalvideoads;

			return view('frontEnd.publisher.dashboard.ad_valley',[
				
				'adValleytotalgoogleads'=>$adValleytotalgoogleads,
				'adValleytotaldreamployads'=>$adValleytotaldreamployads,
				'adValleytotalvideoads'=>$adValleytotalvideoads,
				'totalmag'=>$totalmag,
			]
	   }
}


?>
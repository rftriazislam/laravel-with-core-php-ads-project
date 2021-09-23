<?php

namespace App\Http\Controllers\frontEnd;

use App\Earning;
use App\Level;
use App\Rank;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Microworks;

class RankController extends Controller
{
    public function index(){

        $impression = DB::table('ad_valley_impression')
            ->where('userid', Auth::user()->id)
            ->first();
          $amount = DB::table('advalley_amount')
            ->get()
            ->max();
          $others_incomes = DB::table('others_incomes')
            ->where('userid', Auth::user()->id)
            ->first();      
        
          $total = Microworks::where('userid',Auth::user()->id)->sum('passback_count');
          //dd($total);  
                        
          $micro = $total*0.000400;
         
        
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
         
        $balance = DB::table('earnings')
            ->where('userid', Auth::user()->id)
            ->first();
        $rpincome = DB::table('earnings')
            ->where('userid', Auth::user()->id)
            ->first();
        $withdraw = DB::table('withdraw')
            ->where('userid', Auth::user()->id)
            ->where('account_type','others_income')
            ->sum('amount');
        $affdrad = DB::table('withdraw')
            ->where('userid', Auth::user()->id)
            ->where('account_type','referral')
            ->sum('amount');
            //echo $adValleytotalgoogleads;
         //var_dump($others_incomes);
         // $advelly_income=$adValleytotalgoogleads+$adValleytotaldreamployads+$adValleytotalvideoads;
         
        // echo ($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley)-$withdraw;

        $shoping_amount = 0;
        if($shop =  DB::table('shopping')->where('userid',Auth::id())->first()){
            $shoping_amount += $shop->selfshopping;
            $shoping_amount += $shop->lv1shopping;
            $shoping_amount += $shop->lv2shopping;
            $shoping_amount += $shop->lv3shopping;
            $shoping_amount += $shop->lv4shopping;
            $shoping_amount += $shop->lv5shopping;
            $shoping_amount += $shop->lv6shopping;
            $shoping_amount += $shop->lv7shopping;
            $shoping_amount += $shop->lv8shopping;
            $shoping_amount += $shop->lv9shopping;
            $shoping_amount += $shop->lv10shopping;
        }else{
            $shoping_amount = 0;
        }

        $other = $adValleytotalgoogleads + $adValleytotaldreamployads + $adValleytotalvideoads + $others_incomes->media_and_social + $micro + $others_incomes->income_valley+ $others_incomes->orbittimes + $shoping_amount;





        $myrank = Rank::where('userid', Auth::user()->id)->first();
        $earning = Earning::where('userid', Auth::user()->id)->first();
        $genByid = Level::where('userid', Auth::user()->id)->first();

        $level1active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level1', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level2active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level2', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level3active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level3', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level4active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level4', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level5active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level5', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level6active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level6', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level7active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level7', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level8active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level8', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level9active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level9', '=', Auth::user()->id) ->where('users.active', 1) ->count();
        $level10active = DB::table('users')->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level10', '=', Auth::user()->id) ->where('users.active', 1) ->count();

        $totalActive = $level1active+$level2active-$level3active+$level4active+$level5active+$level6active+$level7active+$level8active+$level9active+$level10active;
        $ref = app('App\Http\Controllers\frontEnd\DashboardController')->showDashboard()->approveMediaTotal;
        // dd($other);
        

        $gen1 = 0;
        $gen2 = 0;
        $gen3 = 0;
        $totalEarning = 0;
        $othersEarning = 0;
        $totalTeam = 0;

        if (strtoupper($myrank->target_rank) == 'BRONZE'){
            $gen1 = 10;
            $gen2 = 100;
            $gen3 = 150;
            $totalEarning = 50;
            $othersEarning = 25;
            $totalTeam = 350;
            return view('frontEnd.publisher.rank.rank',[
                'myrank' => $myrank,
                'gen1' => $gen1,
                'gen2' => $gen2,
                'gen3' => $gen3,
                'totalEarning' => $totalEarning,
                'othersEarning' => $othersEarning,
                'totalTeam' => $totalTeam,

                'level1active' => $level1active,
                'level2active' => $level2active,
                'level3active' => $level3active,
                'totalActive' => $totalActive,
                'refTot' => $ref,
                'other' => $other,
            ]);
        }else if (strtoupper($myrank->target_rank) == 'SILVER') {
            $level1_rank = DB::table('upline_level')
                ->join('ranks', 'upline_level.userid', '=', 'ranks.userid')
                ->where('upline_level.level1', Auth::user()->id)
                ->where('ranks.rank', 'like', '%bronz%')
                ->count('ranks.userid');
            $level2_rank = DB::table('upline_level')
                ->join('ranks', 'upline_level.userid', '=', 'ranks.userid')
                ->where('upline_level.level2', Auth::user()->id)
                ->where('ranks.rank', 'like', '%bronz%')
                ->count('ranks.userid');
            $level3_rank = DB::table('upline_level')
                ->join('ranks', 'upline_level.userid', '=', 'ranks.userid')
                ->where('upline_level.level3', Auth::user()->id)
                ->where('ranks.rank', 'like', '%bronz%')
                ->count('ranks.userid');
            $level4_rank = DB::table('upline_level')
                ->join('ranks', 'upline_level.userid', '=', 'ranks.userid')
                ->where('upline_level.level4', Auth::user()->id)
                ->where('ranks.rank', 'like', '%bronz%')
                ->count('ranks.userid');

            $gen1 = 20;
            $gen2 = 200;
            $gen3 = 300;
            $gen4 = 100;
            $bronz = 5;
            $current_bronze = $level1_rank + $level2_rank + $level3_rank + $level4_rank;
            $totalEarning = 200;
            $othersEarning = 100;
            $totalTeam = 1550;
            return view('frontEnd.publisher.rank.silverRank', [
                'myrank' => $myrank,
                'gen1' => $gen1,
                'gen2' => $gen2,
                'gen3' => $gen3,
                'gen4' => $gen4,
                'bronz' => $bronz,
                'current_bronze'=>$current_bronze,
                'totalEarning' => $totalEarning,
                'othersEarning' => $othersEarning,
                'totalTeam' => $totalTeam,

                'level1active' => $level1active,
                'level2active' => $level2active,
                'level3active' => $level3active,
                'level4active' => $level4active,
                'totalActive' => $totalActive,
                'refTot' => $ref,
                'other' => $other,
            ]);
        }
    }
    private function uprank($refTot, $other, $level1active, $level2active, $level3active, $level4active, $level5active, $level6active, $level7active, $level8active, $level9active, $level10active){

    }
	
	public function updateRank(){
		ini_set('memory_limit', '2048M');
		$users = DB::table('users')
		->offset(401249)
		->limit(869870)
		->get();
		foreach ($users as $user){
    	    $impression = DB::table('ad_valley_impression')
                ->where('userid', $user->id)
                ->first();       
            $amount = DB::table('advalley_amount')
                ->get()
                ->max();
    			$others_income = DB::table('others_incomes')
                ->where('userid', $user->id)
                ->first();  
    			$total = Microworks::where( 'userid', $user->id )->sum('passback_count');					
            $micro=0 ;
        }
    }
}
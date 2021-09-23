<?php

namespace App\Http\Controllers\frontEnd;

use App\Earning;
use App\Microworks;
use App\Level;
use App\MonthsUser;
use App\TodaysUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard(){		

			$level1active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level1', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level2active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level2', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level3active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level3', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level4active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level4', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level5active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level5', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level6active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level6', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level7active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level7', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level8active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level8', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level9active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level9', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			
			$level10active = DB::table('users') ->join('upline_level', 'users.id', '=', 'upline_level.userid') ->where('upline_level.level10', '=', Auth::user()->id) ->where('users.active', 1) ->count();
			$approveLevel1 = $level1active * 1.000000;
			$approveLevel2 = $level2active * 0.03888;
			$approveLevel3 = $level3active * 0.03888;
			$approveLevel4 = $level4active * 0.03888;
			$approveLevel5 = $level5active * 0.01944;
			$approveLevel6 = $level6active * 0.01944;
			$approveLevel7 = $level7active * 0.01944;
			$approveLevel8 = $level8active * 0.01944;
			$approveLevel9 = $level9active * 0.01944;
			$approveLevel10 = $level10active * 0.01944;
			$approveMediaTotal = $approveLevel1 + $approveLevel2 + $approveLevel3 + $approveLevel4 + $approveLevel5 + $approveLevel6 + $approveLevel7 + $approveLevel8 + $approveLevel9 + $approveLevel10;
			

        $level1_percent = number_format(0.388888*(40/100),6);
        $level2_4_percent = number_format(0.388888*(10/100),6);
        $level5_10_percent = number_format(0.388888*(5/100),6);


        $levels = Level::where('userid', Auth::user()->id)
            ->first();

        $referral_income = Earning::where('userid', Auth::user()->id)
            ->first();
		$rpincome = Earning::where('userid', Auth::user()->id)
            ->first();
			
		/*testing*/
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
          $micro=$total*0.000400;
         
		
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
		/*Endtesting*/
        
        /*Today Total Count + Earning */

        $todayTotal = TodaysUser::where('userid', Auth::user()->id)
            ->whereBetween('updated_at', [Carbon::now()->setTime(0,0)->format('Y-m-d H:i:s'),
                Carbon::now()->setTime(23,59,59)->format('Y-m-d H:i:s')])
            ->first();

        if ($todayTotal == '')
        {
            $todatTotalEarn =0;
            $todayTotalCount =0;

        }else{
            $todayLevel1= $todayTotal->level1;
            $todayLevel2_4 = $todayTotal->level2 + $todayTotal->level3 + $todayTotal->level4;
            $todayLevel5_10 =$todayTotal->level5 + $todayTotal->level6 + $todayTotal->level7+$todayTotal->level8 + $todayTotal->level9 + $todayTotal->level10;
            $todatTotalEarn = ($todayLevel1*$level1_percent) + ($todayLevel2_4*$level2_4_percent) + ($todayLevel5_10*$level5_10_percent);
            $todayTotalCount = $todayLevel1 +  $todayLevel2_4 + $todayLevel5_10;
        }

        /*This month Total*/
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        $monthTotal = MonthsUser::where('userid', Auth::user()->id)
            ->whereBetween('updated_at', [Carbon::now()->setDate($year, $month, 1)
                ->setTime(0,0)->format('Y-m-d H:i:s'),
                Carbon::now()->setTime(23,59,59)->format('Y-m-d H:i:s')])
            ->first();

        if ($monthTotal == ''){
            $monthTotalEarn =0;
            $monthTotalCount =0;
        }else{
            $monthLevel1= $monthTotal->level1;
            $monthLevel2_4 = $monthTotal->level2 + $monthTotal->level3 + $monthTotal->level4;
            $monthLevel5_10 =$monthTotal->level5 + $monthTotal->level6 + $monthTotal->level7+$monthTotal->level8 + $monthTotal->level9 + $monthTotal->level10;
            $monthTotalEarn = ($monthLevel1*$level1_percent) + ($monthLevel2_4*$level2_4_percent) + ($monthLevel5_10*$level5_10_percent);
            $monthTotalCount = $monthLevel1 +  $monthLevel2_4 + $monthLevel5_10;
        }

        return view('frontEnd.publisher.dashboard.showDashboard',[
            'levels'=>$levels,
            'referral_income'=>$referral_income,
            'level1_percent'=>$level1_percent,
            'level2_4_percent'=>$level2_4_percent,
            'level5_10_percent'=>$level5_10_percent,
            'todatTotalEarn'=>$todatTotalEarn,
            'todayTotalCount'=>$todayTotalCount,
            'monthTotalEarn'=>$monthTotalEarn,
            'monthTotalCount'=>$monthTotalCount,
			'level1active'=>$level1active,
			'level2active'=>$level2active,
			'level3active'=>$level3active,
			'level4active'=>$level4active,
			'level5active'=>$level5active,
			'level6active'=>$level6active,
			'level7active'=>$level7active,
			'level8active'=>$level8active,
			'level9active'=>$level9active,
			'level9active'=>$level9active,
			'level10active'=>$level10active,
			'approveLevel1'=>$approveLevel1,
			'approveLevel2'=>$approveLevel2,
			'approveLevel3'=>$approveLevel3,
			'approveLevel4'=>$approveLevel4,
			'approveLevel5'=>$approveLevel5,
			'approveLevel6'=>$approveLevel6,
			'approveLevel7'=>$approveLevel7,
			'approveLevel8'=>$approveLevel8,
			'approveLevel9'=>$approveLevel9,
			'approveLevel10'=>$approveLevel10,
			'approveMediaTotal'=>$approveMediaTotal,
			'rpincome'=>$rpincome,
			'advelly_income'=>$adValleytotalgoogleads + $adValleytotaldreamployads + $adValleytotalvideoads,
		    'others_incomes'=>$others_incomes,
		    'micro'=>$micro,
			
			
			
        ]);
    }

  /*  public function showDashboard(){


        $level1_count = DB::table('users')->where('sponsorid', Auth::user()->id)
            ->count();

        $level1_ids = DB::table('users')->where('sponsorid', Auth::user()->id)
            ->select('id')
            ->get();

        $level2_count =0;
        $level2_ids = array();

        foreach ($level1_ids as $level1_id){
            $level2_count = $level2_count + $this->levelCount($level1_id->id);
            $level2_ids[] = $this->levelId($level1_id->id);
        }


        $level3_count =0;
        $level3_ids = array();

        foreach ($level2_ids as $level2_id){
            for ($i =0; $i<count($level2_id); $i++){
                $level3_count = $level3_count + $this->levelCount($level2_id[$i]->id);
                $level3_ids[] = $this->levelId($level2_id[$i]->id);
            }
        }
        $level4_count =0;
        $level4_ids = array();

        foreach ($level3_ids as $level3_id){
            for ($i =0; $i<count($level3_id); $i++){
                $level4_count = $level4_count + $this->levelCount($level3_id[$i]->id);
                $level4_ids[] = $this->levelId($level3_id[$i]->id);
            }
        }

        $level5_count =0;
        $level5_ids = array();

        foreach ($level4_ids as $level4_id){
            for ($i =0; $i<count($level4_id); $i++){
                $level5_count = $level5_count + $this->levelCount($level4_id[$i]->id);
                $level5_ids[] = $this->levelId($level4_id[$i]->id);
            }
        }

        $level6_count =0;
        $level6_ids = array();

        foreach ($level5_ids as $level5_id){
            for ($i =0; $i<count($level5_id); $i++){
                $level6_count = $level6_count + $this->levelCount($level5_id[$i]->id);
                $level6_ids[] = $this->levelId($level5_id[$i]->id);
            }
        }

        $level7_count =0;
        $level7_ids = array();

        foreach ($level6_ids as $level6_id){
            for ($i =0; $i<count($level6_id); $i++){
                $level7_count = $level7_count + $this->levelCount($level6_id[$i]->id);
                $level7_ids[] = $this->levelId($level6_id[$i]->id);
            }
        }

        $level8_count =0;
        $level8_ids = array();

        foreach ($level7_ids as $level7_id){
            for ($i =0; $i<count($level7_id); $i++){
                $level8_count = $level8_count + $this->levelCount($level7_id[$i]->id);
                $level8_ids[] = $this->levelId($level7_id[$i]->id);
            }
        }

        $level9_count =0;
        $level9_ids = array();

        foreach ($level8_ids as $level8_id){
            for ($i =0; $i<count($level8_id); $i++){
                $level9_count = $level9_count + $this->levelCount($level8_id[$i]->id);
                $level9_ids[] = $this->levelId($level8_id[$i]->id);
            }
        }

        $level10_count =0;
        $level10_ids = array();

        foreach ($level9_ids as $level9_id){
            for ($i =0; $i<count($level9_id); $i++){
                $level10_count = $level10_count + $this->levelCount($level9_id[$i]->id);
                $level10_ids[] = $this->levelId($level9_id[$i]->id);
            }
        }
        DB::table('levels')
        ->insert([
            'userid'=>Auth::user()->id,
            'level1'=>$level1_count,
            'level2'=>$level2_count,
            'level3'=>$level3_count,
            'level4'=>$level4_count,
            'level5'=>$level5_count,
            'level6'=>$level6_count,
            'level7'=>$level7_count,
            'level8'=>$level8_count,
            'level9'=>$level9_count,
            'level10'=>$level10_count,
        ]);

        $level1_percent = number_format(0.388888*(40/100),6);
        $level2_4_percent = number_format(0.388888*(10/100),6);
        $level5_10_percent = number_format(0.388888*(5/100),6);


        return view('frontEnd.publisher.dashboard.showDashboard',[
            'level1_count'=>$level1_count,
            'level2_count'=>$level2_count,
            'level3_count'=>$level3_count,
            'level4_count'=>$level4_count,
            'level5_count'=>$level5_count,
            'level6_count'=>$level6_count,
            'level7_count'=>$level7_count,
            'level8_count'=>$level8_count,
            'level9_count'=>$level9_count,
            'level10_count'=>$level10_count,
            'level1_percent'=>$level1_percent,
            'level2_4_percent'=>$level2_4_percent,
            'level5_10_percent'=>$level5_10_percent,
        ]);
    }
    public function levelCount($id){
        $count = DB::table('users')->where('sponsorid', $id)
            ->count();
        return $count;
    }

    public function levelId($id){
        $count = DB::table('users')->where('sponsorid', $id)
            ->select('id')
            ->get();
        return $count;
    }*/


}

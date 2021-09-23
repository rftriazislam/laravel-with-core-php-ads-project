<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function (){
            ini_set('memory_limit', '2048M');
            $this->insertUplevel();
            $this->incomeValleyCron();
            $this->totalIncomeValley();            

        })->dailyAt('11:15');
		$schedule->call(function (){
            ini_set('memory_limit', '2048M');
            $this->adValleyCron();
            $this->totalAdvalley();
			$this->othersIncomeTotal();

        })->dailyAt('19:15');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
    protected function othersIncomeTotal(){
        $users = DB::table('others_incomes')
            ->get();
        foreach ($users as $user){
            DB::table('earnings')
                ->where('userid', $user->userid)
                ->update([
                    'others_income'=>$user->add_valley + $user->income_valley,
                ]);
        }
    }

    protected function incomeValleyCron(){
        $users = DB::table('income_valley')
            ->get();
            DB::table('income_valley')
                ->update([
                    'lv1youtube_blog'=>0,
                    'lv1ppd_wt'=>0,
                    'lv1download_survey'=>0,
                    'lv1signup'=>0,
                    'lv2youtube_blog'=>0,
                    'lv2ppd_wt'=>0,
                    'lv2download_survey'=>0,
                    'lv2signup'=>0,
                    'lv3youtube_blog'=>0,
                    'lv3ppd_wt'=>0,
                    'lv3download_survey'=>0,
                    'lv3signup'=>0,
                    'lv4youtube_blog'=>0,
                    'lv4ppd_wt'=>0,
                    'lv4download_survey'=>0,
                    'lv4signup'=>0,
                    'lv5youtube_blog'=>0,
                    'lv5ppd_wt'=>0,
                    'lv5download_survey'=>0,
                    'lv5signup'=>0,
                    'lv6youtube_blog'=>0,
                    'lv6ppd_wt'=>0,
                    'lv6download_survey'=>0,
                    'lv6signup'=>0,
                    'lv7youtube_blog'=>0,
                    'lv7ppd_wt'=>0,
                    'lv7download_survey'=>0,
                    'lv7signup'=>0,
                    'lv8youtube_blog'=>0,
                    'lv8ppd_wt'=>0,
                    'lv8download_survey'=>0,
                    'lv8signup'=>0,
                    'lv9youtube_blog'=>0,
                    'lv9ppd_wt'=>0,
                    'lv9download_survey'=>0,
                    'lv9signup'=>0,
                    'lv10youtube_blog'=>0,
                    'lv10ppd_wt'=>0,
                    'lv10download_survey'=>0,
                    'lv10signup'=>0,
                ]);

        foreach ($users as $user){


            $level = DB::table('upline_level')
                ->where('userid', $user->userid)
                ->first();

            $level1 = $level->level1;
            $level2 = $level->level2;
            $level3 = $level->level3;
            $level4 = $level->level4;
            $level5 = $level->level5;
            $level6 = $level->level6;
            $level7 = $level->level7;
            $level8 = $level->level8;
            $level9 = $level->level9;
            $level10 = $level->level10;

            if ($level1 != 0){
                $levelincome = $this->incomeValleyGetReturn($level1);
                DB::table('income_valley')
                    ->where('userid', $level1)
                    ->update([
                        'lv1youtube_blog'=>$levelincome->lv1youtube_blog +$user->selfyoutube_blog*40/100,
                        'lv1ppd_wt'=>$levelincome->lv1ppd_wt +$user->selfppd_wt*40/100,
                        'lv1signup'=>$levelincome->lv1signup +$user->selfsignup*40/100,
                        'lv1download_survey'=>$levelincome->lv1download_survey +$user->selfdownload_survey*40/100,
                    ]);
            }else{
                continue;
            }

            if ($level2 != 0){
                $levelincome = $this->incomeValleyGetReturn($level2);
                DB::table('income_valley')
                    ->where('userid', $level2)
                    ->update([
                        'lv2youtube_blog'=>$levelincome->lv2youtube_blog +$user->selfyoutube_blog*10/100,
                        'lv2ppd_wt'=>$levelincome->lv2ppd_wt +$user->selfppd_wt*10/100,
                        'lv2signup'=>$levelincome->lv2signup +$user->selfsignup*10/100,
                        'lv2download_survey'=>$levelincome->lv2download_survey +$user->selfdownload_survey*10/100,
                    ]);
            }else{
                continue;
            }


            if ($level3 != 0){
                $levelincome = $this->incomeValleyGetReturn($level3);
                DB::table('income_valley')
                    ->where('userid', $level3)
                    ->update([
                        'lv3youtube_blog'=>$levelincome->lv3youtube_blog +$user->selfyoutube_blog*10/100,
                        'lv3ppd_wt'=>$levelincome->lv3ppd_wt +$user->selfppd_wt*10/100,
                        'lv3signup'=>$levelincome->lv3signup +$user->selfsignup*10/100,
                        'lv3download_survey'=>$levelincome->lv3download_survey +$user->selfdownload_survey*10/100,
                    ]);
            }else{
                continue;
            }

            if ($level4 != 0){
                $levelincome = $this->incomeValleyGetReturn($level4);
                DB::table('income_valley')
                    ->where('userid', $level4)
                    ->update([
                        'lv4youtube_blog'=>$levelincome->lv4youtube_blog +$user->selfyoutube_blog*10/100,
                        'lv4ppd_wt'=>$levelincome->lv4ppd_wt +$user->selfppd_wt*10/100,
                        'lv4signup'=>$levelincome->lv4signup +$user->selfsignup*10/100,
                        'lv4download_survey'=>$levelincome->lv4download_survey +$user->selfdownload_survey*10/100,
                    ]);
            }else{
                continue;
            }


            if ($level5 != 0){
                $levelincome = $this->incomeValleyGetReturn($level5);
                DB::table('income_valley')
                    ->where('userid', $level5)
                    ->update([
                        'lv5youtube_blog'=>$levelincome->lv5youtube_blog +$user->selfyoutube_blog*5/100,
                        'lv5ppd_wt'=>$levelincome->lv5ppd_wt +$user->selfppd_wt*5/100,
                        'lv5signup'=>$levelincome->lv5signup +$user->selfsignup*5/100,
                        'lv5download_survey'=>$levelincome->lv5download_survey +$user->selfdownload_survey*5/100,
                    ]);
            }else{
                continue;
            }


            if ($level6 != 0){
                $levelincome = $this->incomeValleyGetReturn($level6);
                DB::table('income_valley')
                    ->where('userid', $level6)
                    ->update([
                        'lv6youtube_blog'=>$levelincome->lv6youtube_blog +$user->selfyoutube_blog*5/100,
                        'lv6ppd_wt'=>$levelincome->lv6ppd_wt +$user->selfppd_wt*5/100,
                        'lv6signup'=>$levelincome->lv6signup +$user->selfsignup*5/100,
                        'lv6download_survey'=>$levelincome->lv6download_survey +$user->selfdownload_survey*5/100,
                    ]);
            }else{
                continue;
            }


            if ($level7 != 0){
                $levelincome = $this->incomeValleyGetReturn($level7);
                DB::table('income_valley')
                    ->where('userid', $level7)
                    ->update([
                        'lv7youtube_blog'=>$levelincome->lv7youtube_blog +$user->selfyoutube_blog*5/100,
                        'lv7ppd_wt'=>$levelincome->lv7ppd_wt +$user->selfppd_wt*5/100,
                        'lv7signup'=>$levelincome->lv7signup +$user->selfsignup*5/100,
                        'lv7download_survey'=>$levelincome->lv7download_survey +$user->selfdownload_survey*5/100,
                    ]);
            }else{
                continue;
            }


            if ($level8 != 0){
                $levelincome = $this->incomeValleyGetReturn($level8);
                DB::table('income_valley')
                    ->where('userid', $level8)
                    ->update([
                        'lv8youtube_blog'=>$levelincome->lv8youtube_blog +$user->selfyoutube_blog*5/100,
                        'lv8ppd_wt'=>$levelincome->lv8ppd_wt +$user->selfppd_wt*5/100,
                        'lv8signup'=>$levelincome->lv8signup +$user->selfsignup*5/100,
                        'lv8download_survey'=>$levelincome->lv8download_survey +$user->selfdownload_survey*5/100,
                    ]);
            }else{
                continue;
            }


            if ($level9 != 0){
                $levelincome = $this->incomeValleyGetReturn($level9);
                DB::table('income_valley')
                    ->where('userid', $level9)
                    ->update([
                        'lv9youtube_blog'=>$levelincome->lv9youtube_blog +$user->selfyoutube_blog*5/100,
                        'lv9ppd_wt'=>$levelincome->lv9ppd_wt +$user->selfppd_wt*5/100,
                        'lv9signup'=>$levelincome->lv9signup +$user->selfsignup*5/100,
                        'lv9download_survey'=>$levelincome->lv9download_survey +$user->selfdownload_survey*5/100,
                    ]);
            }else{
                continue;
            }


            if ($level10 != 0){
                $levelincome = $this->incomeValleyGetReturn($level10);
                DB::table('income_valley')
                    ->where('userid', $level10)
                    ->update([
                        'lv10youtube_blog'=>$levelincome->lv10youtube_blog +$user->selfyoutube_blog*5/100,
                        'lv10ppd_wt'=>$levelincome->lv10ppd_wt +$user->selfppd_wt*5/100,
                        'lv10signup'=>$levelincome->lv10signup +$user->selfsignup*5/100,
                        'lv10download_survey'=>$levelincome->lv10download_survey +$user->selfdownload_survey*5/100,
                    ]);
            }
        }
    }

    protected function incomeValleyGetReturn($userid){
        $insert = DB::table('income_valley')
            ->where('userid', $userid)
            ->get();
        if (count($insert) == 0){
            DB::table('income_valley')
                ->where('userid', $userid)
                ->insert([
                    'userid'=>$userid,
                ]);
        }
        $user = DB::table('income_valley')
            ->where('userid', $userid)
            ->first();
        return $user;
    }

	protected function adValleyCron(){
        $users = DB::table('upline_level')
            ->get();
        foreach ( $users as $user){
            $id = $user->userid;
            $level1gad = $this->google_ad('level1', $id);
            $level1vad = $this->video_ad('level1', $id);
            $level1dad = $this->dreamploy_ad('level1', $id);

            $level2gad = $this->google_ad('level2', $id);
            $level2vad = $this->video_ad('level2', $id);
            $level2dad = $this->dreamploy_ad('level2', $id);

            $level3gad = $this->google_ad('level3', $id);
            $level3vad = $this->video_ad('level3', $id);
            $level3dad = $this->dreamploy_ad('level3', $id);

            $level4gad = $this->google_ad('level4', $id);
            $level4vad = $this->video_ad('level4', $id);
            $level4dad = $this->dreamploy_ad('level4', $id);

            $level5gad = $this->google_ad('level5', $id);
            $level5vad = $this->video_ad('level5', $id);
            $level5dad = $this->dreamploy_ad('level5', $id);

            $level6gad = $this->google_ad('level6', $id);
            $level6vad = $this->video_ad('level6', $id);
            $level6dad = $this->dreamploy_ad('level6', $id);

            $level7gad = $this->google_ad('level7', $id);
            $level7vad = $this->video_ad('level7', $id);
            $level7dad = $this->dreamploy_ad('level7', $id);

            $level8gad = $this->google_ad('level8', $id);
            $level8vad = $this->video_ad('level8', $id);
            $level8dad = $this->dreamploy_ad('level8', $id);

            $level9gad = $this->google_ad('level9', $id);
            $level9vad = $this->video_ad('level9', $id);
            $level9dad = $this->dreamploy_ad('level9', $id);

            $level10gad = $this->google_ad('level10', $id);
            $level10vad = $this->video_ad('level10', $id);
            $level10dad = $this->dreamploy_ad('level10', $id);

            DB::table('ad_valley_impression')
                ->where('userid', $id)
                ->update([
                    'lv1google_ad'=>$level1gad,
                    'lv1dreamploy_ad'=>$level1dad,
                    'lv1video_ad'=>$level1vad,
                    'lv2google_ad'=>$level2gad,
                    'lv2dreamploy_ad'=>$level2dad,
                    'lv2video_ad'=>$level2vad,
                    'lv3google_ad'=>$level3gad,
                    'lv3dreamploy_ad'=>$level3dad,
                    'lv3video_ad'=>$level3vad,
                    'lv4google_ad'=>$level4gad,
                    'lv4dreamploy_ad'=>$level4dad,
                    'lv4video_ad'=>$level4vad,
                    'lv5google_ad'=>$level5gad,
                    'lv5dreamploy_ad'=>$level5dad,
                    'lv5video_ad'=>$level5vad,
                    'lv6google_ad'=>$level6gad,
                    'lv6dreamploy_ad'=>$level6dad,
                    'lv6video_ad'=>$level6vad,
                    'lv7google_ad'=>$level7gad,
                    'lv7dreamploy_ad'=>$level7dad,
                    'lv7video_ad'=>$level7vad,
                    'lv8google_ad'=>$level8gad,
                    'lv8dreamploy_ad'=>$level8dad,
                    'lv8video_ad'=>$level8vad,
                    'lv9google_ad'=>$level9gad,
                    'lv9dreamploy_ad'=>$level9dad,
                    'lv9video_ad'=>$level9vad,
                    'lv10google_ad'=>$level10gad,
                    'lv10dreamploy_ad'=>$level10dad,
                    'lv10video_ad'=>$level10vad,
                ]);
        }

    }

    protected function google_ad($level, $userid){
        $levelgoogle_ad = DB::table('upline_level')
            ->join('ad_valley_impression', 'ad_valley_impression.userid', '=', 'upline_level.userid')
            ->where('upline_level.'.$level, $userid)
            ->sum('ad_valley_impression.selfgoogle_ad');
        return $levelgoogle_ad;
    }

    protected function dreamploy_ad($level, $userid){
        $leveldreamploy_ad = DB::table('upline_level')
            ->join('ad_valley_impression', 'ad_valley_impression.userid', '=', 'upline_level.userid')
            ->where('upline_level.'.$level, $userid)
            ->sum('ad_valley_impression.selfdreamploy_ad');
        return $leveldreamploy_ad;
    }

    protected function video_ad($level, $userid){
        $levelvideo_ad = DB::table('upline_level')
            ->join('ad_valley_impression', 'ad_valley_impression.userid', '=', 'upline_level.userid')
            ->where('upline_level.'.$level, $userid)
            ->sum('ad_valley_impression.selfvideo_ad');
        return $levelvideo_ad;
    }
	
    protected function insertUplevel(){
        $max = DB::table('upline_level')
            ->get()
            ->max();
			
			

        $users = DB::table('users') 
			->where('id', '>', $max->userid )
            ->get();

        foreach ($users as $user){
            $level1 = 0;
            $level2 = 0;
            $level3 = 0;
            $level4 = 0;
            $level5 = 0;
            $level6 = 0;
            $level7 = 0;
            $level8 = 0;
            $level9 = 0;
            $level10 = 0;

            $level1 = $user->sponsorid;
            if (strcmp($level1, '000000') != 0){
                $level2 = $this->sponsorid($level1);
            }

            if (strcmp($level2, '000000') != 0 && $level2 != 0){
                $level3 = $this->sponsorid($level2);
            }

            if (strcmp($level3, '000000') != 0 && $level3 != 0){
                $level4 = $this->sponsorid($level3);
            }
			
            if (strcmp($level4, '000000') != 0 && $level4 != 0){
                $level5 = $this->sponsorid($level4);
            }
			
            if (strcmp($level5, '000000') != 0 && $level5 != 0){
                $level6 = $this->sponsorid($level5);
            }

            if (strcmp($level6, '000000') != 0 && $level6 != 0){
                $level7 = $this->sponsorid($level6);
            }

            if (strcmp($level7, '000000') != 0 && $level7 != 0){
                $level8 = $this->sponsorid($level7);
            }

            if (strcmp($level8, '000000') != 0 && $level8 != 0){
                $level9 = $this->sponsorid($level8);
            }

            if (strcmp($level9, '000000') != 0 && $level9 != 0){
                $level10 = $this->sponsorid($level9);
            }
                DB::table('upline_level')
                    ->insert([
                        'userid'=>$user->id,
                        'level1'=>preg_replace("/[^0-9]/", "",$level1),
                        'level2'=>preg_replace("/[^0-9]/", "",$level2),
                        'level3'=>preg_replace("/[^0-9]/", "",$level3),
                        'level4'=>preg_replace("/[^0-9]/", "",$level4),
                        'level5'=>preg_replace("/[^0-9]/", "",$level5),
                        'level6'=>preg_replace("/[^0-9]/", "",$level6),
                        'level7'=>preg_replace("/[^0-9]/", "",$level7),
                        'level8'=>preg_replace("/[^0-9]/", "",$level8),
                        'level9'=>preg_replace("/[^0-9]/", "",$level9),
                        'level10'=>preg_replace("/[^0-9]/", "",$level10)
                    ]);
            
        }
    }

    protected function sponsorid($userid){
        $user = DB::table('users')
            ->where('id', $userid)
            ->select('sponsorid')
            ->first();
        return $user->sponsorid;
    }

    protected function totalIncomeValley(){
        $income_valleys = DB::table('income_valley')
            ->get();
        foreach ($income_valleys as $income_valley){
            $amount = $income_valley->selfdownload_survey +$income_valley->selfyoutube_blog + $income_valley->selfppd_wt +
                $income_valley->lv1download_survey +$income_valley->lv1youtube_blog + $income_valley->lv1ppd_wt +
                $income_valley->lv2download_survey +$income_valley->lv2youtube_blog + $income_valley->lv2ppd_wt +
                $income_valley->lv3download_survey +$income_valley->lv3youtube_blog + $income_valley->lv3ppd_wt +
                $income_valley->lv4download_survey +$income_valley->lv4youtube_blog + $income_valley->lv4ppd_wt +
                $income_valley->lv5download_survey +$income_valley->lv5youtube_blog + $income_valley->lv5ppd_wt +
                $income_valley->lv6download_survey +$income_valley->lv6youtube_blog + $income_valley->lv6ppd_wt +
                $income_valley->lv7download_survey +$income_valley->lv7youtube_blog + $income_valley->lv7ppd_wt +
                $income_valley->lv8download_survey +$income_valley->lv8youtube_blog + $income_valley->lv8ppd_wt +
                $income_valley->lv9download_survey +$income_valley->lv9youtube_blog + $income_valley->lv9ppd_wt +
                $income_valley->lv10download_survey +$income_valley->lv10youtube_blog + $income_valley->lv10ppd_wt;

            DB::table('others_incomes')
                ->where('userid', $income_valley->userid)
                ->update([
                    'income_valley'=>$amount,
                ]);
        }
    }

    protected function totalAdvalley(){
        $ad_valleys = DB::table('ad_valley_impression')
            ->get();
        $ad_amount = DB::table('advalley_amount')
            ->get()
            ->max();
        foreach ($ad_valleys as $ad_valley){
            $googl1= floor($ad_valley->lv1google_ad*.4)*$ad_amount->gad;
            $google2_4= floor(($ad_valley->lv2google_ad + $ad_valley->lv3google_ad +
                        $ad_valley->lv4google_ad)*.1) * $ad_amount->gad;

            $google5_10 =floor(($ad_valley->lv5google_ad + $ad_valley->lv6google_ad
                        + $ad_valley->lv7google_ad + $ad_valley->lv8google_ad
                        + $ad_valley->lv9google_ad + $ad_valley->lv10google_ad)
                    *.05) * $ad_amount->gad;

            $video1 = floor($ad_valley->lv1video_ad*.4)*$ad_amount->vad;
            $videolv2_4 = floor(($ad_valley->lv2video_ad + $ad_valley->lv3video_ad
                        + $ad_valley->lv4video_ad)*.1) * $ad_amount->vad;

            $videolv5_10 =floor(($ad_valley->lv5video_ad + $ad_valley->lv6video_ad +
                        $ad_valley->lv7video_ad +
                        $ad_valley->lv8video_ad + $ad_valley->lv9video_ad +
                        $ad_valley->lv10video_ad)*.05) * $ad_amount->vad;

            $amount  = $ad_valley->selfgoogle_ad * $ad_amount->gad +
                $ad_valley->selfvideo_ad * $ad_amount->vad + $googl1 + $video1 +
                $google2_4 + $videolv2_4 + $google5_10 + $videolv5_10;


            DB::table('others_incomes')
                ->where('userid', $ad_valley->userid)
                ->update([
                    'add_valley'=>$amount,
                ]);
        }
    }
}

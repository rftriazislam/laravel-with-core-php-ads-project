<?php

namespace App\Http\Controllers;

use App\Earning;
use App\EmailMarketing;
use App\Rank;
use App\TodaysUser;
use App\User;
use App\Microworks;
use App\UserDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FrontEnd\TotalMagController;
use App\Unit;
use PDOException;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function custome_print($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();
    }

    // public function update_earnings_re()
    // {

    //     $dataa = DB::table('earnings_new')->get();

    //     // return $dataa;
    //     // exit();
    //     foreach ($dataa as $data) {

    //         DB::table('earnings')->where('userid', $data->userid)->update([
    //             'referral_income' => $data->referral_income,
    //             'others_income' => $data->others_income,
    //             'approved_income' => $data->approved_income,
    //             'rpincome' => $data->rpincome,
    //             'add_rpincome' => $data->add_rpincome,
    //         ]);
    //     }
    // }

    public function index()
    {

        // return 'Please wait for our Update ';
        // exit();
        $level1_percent = number_format(0.388888 * (40 / 100), 6);
        $level2_4_percent = number_format(0.388888 * (10 / 100), 6);
        $level5_10_percent = number_format(0.388888 * (5 / 100), 6);

        $total_amount = 0;
        if ($shop =  DB::table('shopping')->where('userid', Auth::id())->first()) {
            $total_amount += $shop->selfshopping;
            $total_amount += $shop->lv1shopping;
            $total_amount += $shop->lv2shopping;
            $total_amount += $shop->lv3shopping;
            $total_amount += $shop->lv4shopping;
            $total_amount += $shop->lv5shopping;
            $total_amount += $shop->lv6shopping;
            $total_amount += $shop->lv7shopping;
            $total_amount += $shop->lv8shopping;
            $total_amount += $shop->lv9shopping;
            $total_amount += $shop->lv10shopping;
        } else {
            $total_amount = 0;
        }

        /* unit count*/

        // $levels = [];
        // $level = DB::table('upline_level')->where('userid',Auth::id())->first();
        // if(isset($level)){
        // $levels[] = $level->level1;
        // $levels[] = $level->level2;
        // $levels[] = $level->level3;
        // $levels[] = $level->level4;
        // $levels[] = $level->level5;
        // $levels[] = $level->level6;
        // $levels[] = $level->level7;
        // $levels[] = $level->level8;
        // $levels[] = $level->level9;
        // $levels[] = $level->level10;  
        // $totalunit  = 0; 
        // }

        //var_dump($totalunit);
        // if(Unit::totalGet()){
        // $totalunit  = Unit::totalGet();
        // }
        //var_dump(Unit::totalGet());

        /* end unit count*/
        /*referral_income*/
        $referral_income = Earning::where('userid', Auth::user()->id)
            ->select('referral_income')
            ->first();

        $others_income = DB::table('others_incomes')
            ->where('userid', Auth::user()->id)
            ->first();

        $total = Microworks::where('userid', Auth::user()->id)->sum('passback_count');
        $micro = $total * 0.000400;
        $rpincome = DB::table('earnings')
            ->where('userid', Auth::user()->id)
            ->first();

        $email_price = EmailMarketing::where('user_id', Auth::user()->id)->where('status', 2)->sum('price');


        /*Today Total Count + Earning */

        $todayTotal = TodaysUser::where('userid', Auth::user()->id)
            ->whereBetween('updated_at', [
                Carbon::now()->setTime(0, 0)->format('Y-m-d H:i:s'),
                Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
            ])
            ->first();


        //Ad Vally
        $impression = DB::table('ad_valley_impression')
            ->where('userid', Auth::user()->id)
            ->first();

        $amount = DB::table('advalley_amount')
            ->get()
            ->max();

        //$this->custome_print($amount);

        $adValleytotalgoogleads = $impression->selfgoogle_ad * $amount->gad +
            $impression->lv1google_ad * $amount->gad * .4 +
            $impression->lv2google_ad * $amount->gad * .1 +
            $impression->lv3google_ad * $amount->gad * .1 +
            $impression->lv4google_ad * $amount->gad * .1 +
            $impression->lv5google_ad * $amount->gad * .05 +
            $impression->lv6google_ad * $amount->gad * .05 +
            $impression->lv7google_ad * $amount->gad * .05 +
            $impression->lv8google_ad * $amount->gad * .05 +
            $impression->lv9google_ad * $amount->gad * .05 +
            $impression->lv10google_ad * $amount->gad * .05;


        //$this->custome_print($adValleytotalgoogleads);

        $adValleytotaldreamployads = $impression->selfdreamploy_ad * $amount->dad +
            $impression->lv1dreamploy_ad * $amount->dad * .4 +
            $impression->lv2dreamploy_ad * $amount->dad * .1 +
            $impression->lv3dreamploy_ad * $amount->dad * .1 +
            $impression->lv4dreamploy_ad * $amount->dad * .1 +
            $impression->lv5dreamploy_ad * $amount->dad * .05 +
            $impression->lv6dreamploy_ad * $amount->dad * .05 +
            $impression->lv7dreamploy_ad * $amount->dad * .05 +
            $impression->lv8dreamploy_ad * $amount->dad * .05 +
            $impression->lv9dreamploy_ad * $amount->dad * .05 +
            $impression->lv10dreamploy_ad * $amount->dad * .05;

        //$this->custome_print($adValleytotaldreamployads);					

        $adValleytotalvideoads = $impression->selfvideo_ad * $amount->vad +
            $impression->lv1video_ad * $amount->vad * .4 +
            $impression->lv2video_ad * $amount->vad * .1 +
            $impression->lv3video_ad * $amount->vad * .1 +
            $impression->lv4video_ad * $amount->vad * .1 +
            $impression->lv5video_ad * $amount->vad * .05 +
            $impression->lv6video_ad * $amount->vad * .05 +
            $impression->lv7video_ad * $amount->vad * .05 +
            $impression->lv8video_ad * $amount->vad * .05 +
            $impression->lv9video_ad * $amount->vad * .05 +
            $impression->lv10video_ad * $amount->vad * .05;

        //$this->custome_print($adValleytotalvideoads);

        $totalmag = $adValleytotalgoogleads + $adValleytotaldreamployads + $adValleytotalvideoads;

        //$this->custome_print($totalmag);

        if ($todayTotal == '') {
            $todatTotalEarn = 0;

            return view('frontEnd.publisher.home.homeContent', [
                'todatTotalEarn' => $todatTotalEarn,
                'referral_income' => $referral_income,
                'others_income' => $others_income,
                'micro' => $micro,
                'rpincome' => $rpincome,
                'adVallyTotalAmount' => $totalmag,
                'total' => 0,
                'shopping' => $total_amount,
                'email_price' => $email_price

            ]);
        }

        $todayLevel1 = $todayTotal->level1;
        $todayLevel2_4 = $todayTotal->level2 + $todayTotal->level3 + $todayTotal->level4;
        $todayLevel5_10 = $todayTotal->level5 + $todayTotal->level6 + $todayTotal->level7 + $todayTotal->level8 + $todayTotal->level9 + $todayTotal->level10;
        $todatTotalEarn = ($todayLevel1 * $level1_percent) + ($todayLevel2_4 * $level2_4_percent) + ($todayLevel5_10 * $level5_10_percent);

        //$this->custome_print($todatTotalEarn);

        return view('frontEnd.publisher.home.homeContent', [
            'todatTotalEarn' => $todatTotalEarn,
            'referral_income' => $referral_income,
            'others_income' => $others_income,
            'micro' => $micro,
            'rpincome' => $rpincome,
            'adVallyTotalAmount' => $totalmag,
            'total' => 0,
            'shopping' => $total_amount,
            'email_price' => $email_price

        ]);
    }

    public function insertUplevel()
    {
        ini_set('memory_limit', '2048M');
        $max = DB::table('upline_level')
            ->get()
            ->max();



        $users = DB::table('users')
            ->where('id', '>', $max->userid)
            ->get();

        foreach ($users as $user) {
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
            if (strcmp($level1, '000000') != 0) {
                $level2 = $this->sponsorid($level1);
            }
            if (strcmp($level2, '000000') != 0 && $level2 != 0) {
                $level3 = $this->sponsorid($level2);
            }
            if (strcmp($level3, '000000') != 0 && $level3 != 0) {
                $level4 = $this->sponsorid($level3);
            }
            if (strcmp($level4, '000000') != 0 && $level4 != 0) {
                $level5 = $this->sponsorid($level4);
            }
            if (strcmp($level5, '000000') != 0 && $level5 != 0) {
                $level6 = $this->sponsorid($level5);
            }
            if (strcmp($level6, '000000') != 0 && $level6 != 0) {
                $level7 = $this->sponsorid($level6);
            }
            if (strcmp($level7, '000000') != 0 && $level7 != 0) {
                $level8 = $this->sponsorid($level7);
            }
            if (strcmp($level8, '000000') != 0 && $level8 != 0) {
                $level9 = $this->sponsorid($level8);
            }
            if (strcmp($level9, '000000') != 0 && $level9 != 0) {
                $level10 = $this->sponsorid($level9);
            }
            DB::table('upline_level')
                ->insert([
                    'userid' => $user->id,
                    'level1' => preg_replace("/[^0-9]/", "", $level1),
                    'level2' => preg_replace("/[^0-9]/", "", $level2),
                    'level3' => preg_replace("/[^0-9]/", "", $level3),
                    'level4' => preg_replace("/[^0-9]/", "", $level4),
                    'level5' => preg_replace("/[^0-9]/", "", $level5),
                    'level6' => preg_replace("/[^0-9]/", "", $level6),
                    'level7' => preg_replace("/[^0-9]/", "", $level7),
                    'level8' => preg_replace("/[^0-9]/", "", $level8),
                    'level9' => preg_replace("/[^0-9]/", "", $level9),
                    'level10' => preg_replace("/[^0-9]/", "", $level10)
                ]);
        }
    }

    protected function sponsorid($userid)
    {
        $user = DB::table('users')
            ->where('id', $userid)
            ->select('sponsorid')
            ->first();
        return $user->sponsorid;
    }
    public function test()
    {
    }
    public function email_marketing()
    {



        $data = EmailMarketing::select('id', 'email', 'status')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view(
            'frontEnd.publisher.email.emailmarketing',
            compact('data')
        );
    }

    public function save_email(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $p =  $this->validate($request, [
            'user_id' => 'required',
            'email' => 'required|unique:email_marketings',
            'password' => 'required',
            'recovery_email' => 'nullable',
        ]);



        try {
            $save = EmailMarketing::create($p);
            return back()->with('message', 'Succefully add');
        } catch (PDOException $e) {

            return back()->with('message', 'validate data missing ');
        }
    }
}
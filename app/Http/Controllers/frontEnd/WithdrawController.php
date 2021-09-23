<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Mail\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\frontEnd\DashboardController;
use App\Microworks;
class WithdrawController extends Controller
{
	protected $amount;
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

		// dd($rpincome);
        return view('frontEnd.publisher.withdraw.index', [
           'balance'=>$balance,
           'withdraw'=>$withdraw,
           'rpincome'=>$rpincome,
		   'advelly_income'=>$adValleytotalgoogleads+$adValleytotaldreamployads+$adValleytotalvideoads,
		   'others_incomes'=>$others_incomes,
		   'micro'=>$micro,
		   'affdraw'=>$affdrad,
		   'shoping'=>$shoping_amount,
        ]);
    }

    public function withdrawPostAction(Request $request){
		//echo $request->payment_processor;



        $this->validate($request,[
            'amount'=>'required'
        ]);

        if (strcmp($request->payment_processor, "mcash") == 0){
            $this->validate($request,[
                'acc_number'=>'required'
            ]);
            $account_no = $request->acc_number;
        }else  if (strcmp($request->payment_processor, "payza") == 0){
            $this->validate($request,[
                'acc_email'=>'required|email'
            ]);
            $account_no = $request->acc_email;
        }else if (strcmp($request->payment_processor, "payoneer") == 0){
            $this->validate($request,[
                'pay_acc_email'=>'required|email'
            ]);
            $account_no = $request->pay_acc_email;
        }else if($request->payment_processor =="bkash"){
			 $this->validate($request,[
                'bkash_number'=>'required|min:11|max:12'
            ]);
			$account_no = $request->bkash_number;
		}else if($request->payment_processor == "rocket"){
			 $this->validate($request,[
                'rocket_number'=>'required|min:11|max:12',
				
            ]);
			$account_no = $request->rocket_number;
			
		}
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
		
		/*end testing*/

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
		
		$total = Microworks::where('userid',Auth::user()->id)
		                    ->sum('passback_count');
		 // dd($total);					
          $micro = $total*0.000400;

        $balance = DB::table('earnings')
            ->where('userid', Auth::user()->id)
            ->first();
		$rpincome = DB::table('earnings')
            ->where('userid', Auth::user()->id)
            ->first();
       	$advelly_income=$adValleytotalgoogleads+$adValleytotaldreamployads+$adValleytotalvideoads;


        if ($request->amount < 10){
            return redirect('/withdraw')->with('message', 'Amount must be equal or greater than 10');
        }else if($request->account_type == "others_income"){
        	$withdraw = DB::table('withdraw')->where('userid', Auth::user()->id)->where('account_type','others_income')->sum('amount');
			if($request->amount > (($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley+ $others_incomes->orbittimes + $others_incomes->blog + $shoping_amount)-$withdraw)){
            	return redirect('/withdraw')->with('message','You Don\'t Have Enough Balance For Withdraw');
			}
        }elseif($request->account_type == "referral"){
        	$withdrawRef = DB::table('withdraw')->where('userid', Auth::user()->id)->where('account_type','referral')->sum('amount');
        	if($request->amount > app('App\Http\Controllers\frontEnd\DashboardController')->showDashboard()->approveMediaTotal - $withdrawRef){
        		return redirect('/withdraw')->with('message','You Don\'t Have Enough Balance For Withdraw.');
        	}
        }else{
        	return redirect('/withdraw')->with('message', 'Something Went Wrong.');
        }
        $countCheck = DB::table('withdraw')->where('userid', Auth::user()->id)->where('account_type','others_income')->where('status', 0)->get();
        if (count($countCheck) > 0){
            return redirect('/withdraw')->with('message', 'Your Withdraw will not proceed right now because your one withdraw is in pending');
        }

        $countCheckR = DB::table('withdraw')->where('userid', Auth::user()->id)->where('account_type','referral')->where('status', 0)->get();
        if (count($countCheckR) > 0){
            return redirect('/withdraw')->with('message', 'Your Withdraw will not proceed right now because your one withdraw is in pending');
        }

        Session::put('account_type', $request->account_type);
        Session::put('payment_processor', $request->payment_processor);
        Session::put('account_no', $account_no);
        Session::put('amount', $request->amount);
        return redirect('/withdraw-password');
    }
    public function passCheckAction(){
        return view('frontEnd.publisher.withdraw.passCheck');
    }
    public function withdrawSuccessAction(Request $request){
        $this->validate($request,[
            'password'=> 'required'
        ]);

        if (Auth::guard()->attempt(['email'=>Auth::user()->email,'password'=>$request->password, 'status'=>1])) {
            $id = DB::table('withdraw')
                ->insertGetId([
                    'userid'=>Auth::user()->id,
                    'account_type'=>Session::get('account_type'),
                    'amount'=>Session::get('amount'),
                    'payment_processor'=>Session::get('payment_processor'),
                    'account_no'=>Session::get('account_no'),
                    'status'=>0,
                ]);
            Mail::to(Auth::user()->email)->send(new Withdraw($id));
            Session::forget(['account_type', 'amount', 'payment_processor', 'account_no']);
            return redirect()->intended('/withdraw')->with('message','Withdraw Successfull. You will receive money within 15 days. Please check your mail');
        }
        return redirect()->back()->with('message','Password Wrong');
    }
	
}

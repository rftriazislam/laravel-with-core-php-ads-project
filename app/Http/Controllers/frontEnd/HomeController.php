<?php

namespace App\Http\Controllers\FrontEnd;
use App\Earning;
use App\Http\Controllers\Controller;
use App\TodaysUser;
use App\User;
use App\Activation;
use App\Microworks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FrontEnd\TotalMagController;

class HomeController extends Controller
{
	
	

    public function index(){

        $users = DB::table('users')
        ->count();
        $marchent  = DB::table('marchents')
            ->count();
        $advertiser  = DB::table('advertisers')
            ->count();
        $country = DB::table('users')
            ->distinct()
            ->get(['country'])
            ->count();


        //dd($country);
		

        return view('frontEnd.home.homeContent', [
            'users'=>$users,
            'marchent'=>$marchent,
            'advertiser'=>$advertiser,
            'country'=>$country,
		     
           ]);
    }

    public function goal(){
        return view('frontEnd.publisher.goal.viewGoal');
    }
    public function marketingPlan(){
        return view('frontEnd.service.marketingPlan');
    }
    public function planSignup(){
        return view('frontEnd.service.signup');
    }
    public function planWithdraw(){
        return view('frontEnd.service.withdraw');
    }
    public function planComChart(){
        return view('frontEnd.service.chart');
    }
    public function planComActivation(){
        return view('frontEnd.service.activation');
    }
    public function planComOrbit(){
        return view('frontEnd.service.orbittimes');
    }
    public function planComCaptcha(){
        return view('frontEnd.service.captcha');
    }
    public function planComUnistag(){
        return view('frontEnd.service.unistag');
    }
    public function planComYoutube(){
        return view('frontEnd.service.youtube');
    }
    public function planComVideo(){
        return view('frontEnd.service.video');
    }
    public function planComFacebooko(){
        return view('frontEnd.service.facebook');
    }
    public function planComFbGroup(){
        return view('frontEnd.service.fbgroup');
    }
    public function planComYoutubeChan(){
        return view('frontEnd.service.youtubeChan');
    }
    public function planComWhatsApp(){
        return view('frontEnd.service.whatsApp');
    }
    public function planComHotLine(){
        return view('frontEnd.service.hotLine');
    }





    public function ourService(){
        return view('frontEnd.service.ourService');
    }
    public function uplineAll(){
        return view('frontEnd.publisher.upline.upline');
    }

    public function tutorial(){
        return view('frontEnd.tutorial.tutorialView');
    }

    public function blogView(){
        $youtubeLinks = DB::table('youtube_blog_links')
            ->where('type','blog')
            ->get();
        return view('frontEnd.tutorial.blog',[
            'youtubeLinks'=>$youtubeLinks,
        ]);
    }
    public function youtubeView(){
        $youtubeLinks = DB::table('youtube_blog_links')
            ->where('type','youtube')
            ->get();
        return view('frontEnd.tutorial.youtube',[
            'youtubeLinks'=>$youtubeLinks,
        ]);
    }

    public function earning(){
        $member = DB::table('earnings')
            ->join('users', 'users.id', '=', 'earnings.userid')
            ->join('user_details', 'user_details.userid', '=', 'earnings.userid')
            ->where('earnings.referral_income', '>=', 10)
            ->select('users.name', 'users.phonenumber','users.country' ,'user_details.*')
            ->count();
        dd($member);

    }

    public function getUsersDetails(Request $request){
		$user = [
			'id'=>0
		];
        if(Auth::guard()->attempt(['email'=>$request->email, 'password'=>$request->password, 'status'=>1])){
            $user = DB::table('users')
                ->join('user_details', 'user_details.userid', '=','users.id')
                ->where('users.id', Auth::id())
                ->select('user_details.image', 'users.id', 'users.name', 'users.email')
                ->first();
            return json_encode($user);
        }
        return json_encode($user);
    }

    public function incomeValley(){
        $income_valley = DB::table('income_valley')
            ->where('userid', Auth::user()->id)
            ->first();
        $income_valley_amount = DB::table('income_valley_amount')
            ->get()
            ->max();
        return view('frontEnd.publisher.incomeValley', [
            'income_valley'=>$income_valley,
            'income_valley_amount'=>$income_valley_amount,
        ]);
    }
	public function webTraffic(){
		return view('frontEnd.publisher.webTraffic');
	}
	public function stationTwo(){
		return view('frontEnd.publisher.station-two');
	}

	
	public function stationThree(){
		return view('frontEnd.publisher.station-three');
	}

    public function blogYoutubeCount(){
        if (Auth::check()){
            $user = DB::table('income_valley')
                ->where('userid', Auth::user()->id)
                ->get();
            $income_valley_amount = DB::table('income_valley_amount')
                ->get()
                ->max();
            if (Session::get('time') == null){
                Session::put('time', Carbon::now()->addSecond(60));
                if (count($user)>0){
                    DB::table('income_valley')
                        ->where('userid', Auth::user()->id)
                        ->update([
                            'selfyoutube_blog'=>$user[0]->selfyoutube_blog + $income_valley_amount->youtube_blog,
                        ]);
                }else{
                    DB::table('income_valley')
                        ->insert([
                            'userid'=>Auth::user()->id,
                            'selfyoutube_blog'=>$income_valley_amount->youtube_blog,
                        ]);
                }
            }else{
                $date = Session::get('time');
                if ($date <= Carbon::now()){
                    Session::put('time', Carbon::now()->addSecond(60));

                    if (count($user)>0){
                        DB::table('income_valley')
                            ->where('userid', Auth::user()->id)
                            ->update([
                                'selfyoutube_blog'=>$user[0]->selfyoutube_blog + $income_valley_amount->youtube_blog,
                            ]);
                    }else{
                        DB::table('income_valley')
                            ->insert([
                                'userid'=>Auth::user()->id,
                                'selfyoutube_blog'=>$income_valley_amount->youtube_blog,
                            ]);
                    }
                }

            }
        }

    }

    public function PpdCount(){
        if (Auth::check()){
            $user = DB::table('income_valley')
                ->where('userid', Auth::user()->id)
                ->get();
            $income_valley_amount = DB::table('income_valley_amount')
                ->get()
                ->max();
            if (Session::get('ppdtime') == null){
                Session::put('ppdtime', Carbon::now()->addSecond(300));
                if (count($user)>0){
                    DB::table('income_valley')
                        ->where('userid', Auth::user()->id)
                        ->update([
                            'selfppd_wt'=>$user[0]->selfppd_wt + $income_valley_amount->ppd_wt,
                        ]);
                }else{
                    DB::table('income_valley')
                        ->insert([
                            'userid'=>Auth::user()->id,
                            'selfppd_wt'=>$income_valley_amount->ppd_wt,
                        ]);
                }
            }else{
                $date = Session::get('ppdtime');
                if ($date <= Carbon::now()){
                    Session::put('ppdtime', Carbon::now()->addSecond(300));

                    if (count($user)>0){
                        DB::table('income_valley')
                            ->where('userid', Auth::user()->id)
                            ->update([
                                'selfppd_wt'=>$user[0]->selfppd_wt + $income_valley_amount->ppd_wt,
                            ]);
                    }else{
                        DB::table('income_valley')
                            ->insert([
                                'userid'=>Auth::user()->id,
                                'selfppd_wt'=>$income_valley_amount->ppd_wt,
                            ]);
                    }
                }

            }
        }
    }

    public function EarnMore(){
        return view('frontEnd.publisher.earnMore');
    }
    public function mediaSocial(){
        return redirect('https://media.dreamploy.com/media-home');
    }
	
	public function microWorks()
	{
		$total = Microworks::where('userid',Auth::user()->id)
		->sum('passback_count');		
        return view('frontEnd.publisher.microworks',compact('total'));
    }
	
	public function videoAdd()
	{
				
        return view('frontEnd.publisher.videoadd');
    }
	
    public function adValley(){
        $adValleyAmount = DB::table('advalley_amount')
            ->get()
            ->max();
        $userImpression = DB::table('ad_valley_impression')
            ->where('userid', Auth::user()->id)
            ->first();
		
        return view('frontEnd.publisher.adValley', [
            'amount'=>$adValleyAmount,
            'impression'=>$userImpression,
        ]);
    }
	
	public function appsDownlod(){
        return redirect('https://trklvs.com/list/38273&subid='.Auth::user()->id);
    }
	
	public function total(){
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
                        'income_valley'=>number_format($amount, 6),
                    ]);
        }
    }
	public function totalAdvalley(){
		ini_set('memory_limit', '2048M');
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
                    'add_valley'=>number_format($amount, 6),
                ]);
        }
    }
	
	public function actionCaptcha(){
        include_once(app_path().'/Http/Controllers/frontEnd/solvemedia.php');
        //echo solvemedia_get_html('GJBZwFqOIktWjqsCPah4PdNylMxerSV-');
		$total = Microworks::where('userid',Auth::user()->id)
		->sum('passback_count');
		return view('frontEnd.publisher.captcha',compact('total'));
    }
	public function postActionCaptcha(Request $request){
		
        include_once(app_path().'/Http/Controllers/frontEnd/solvemedia.php');
        $privkey="zOrIV6huV-JCaVgHbKGxe4lYvagHinVy";
        $hashkey="VLOosSoijA1bpESo60TrI1jadEgqaVcw";
        $solvemedia_response = solvemedia_check_answer($privkey,
            $_SERVER["REMOTE_ADDR"],
            $_POST["adcopy_challenge"],
            $_POST["adcopy_response"],
            $hashkey);
        if (!$solvemedia_response->is_valid) {
			
            return redirect('/captcha')->with('message','Captcha Is not Valid');
        }else {
			DB::table('microworks')
				->insert([
					'userid'=>Auth::user()->id,
					'passback_count'=>1,
				]);
             
			 }							
							
           return redirect('/captcha')->with('message','Captcha Valid');
        }
		
		public function postActionMicro(Request $request){
			
			include_once(app_path().'/Http/Controllers/frontEnd/solvemedia.php');
			$privkey="zOrIV6huV-JCaVgHbKGxe4lYvagHinVy";
			$hashkey="VLOosSoijA1bpESo60TrI1jadEgqaVcw";
			$solvemedia_response = solvemedia_check_answer($privkey,
				$_SERVER["REMOTE_ADDR"],
				$_POST["adcopy_challenge"],
				$_POST["adcopy_response"],
				$hashkey);
			if (!$solvemedia_response->is_valid) {
				
				return redirect('/microworks')->with('message','Captcha Is not Valid');
			
			}else {				
				DB::table('microworks')
					->insert([
						'userid'=>Auth::user()->id,
						'passback_count'=>1,
					]);
				 
				 }           				 
								
			   return redirect('/microworks')->with('message','Captcha Valid');
        }
	
		
	public function challangeAction(){
        return view('frontEnd.publisher.challenge');
    }
	
	public function adValleyCron(){
		ini_set('memory_limit', '-1');
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
    public function accAct(){
        return view('frontEnd.publisher.withdraw.activation');
    }
    public function postAccAct(Request $request){
        $this->validate($request,[
            'number'=>'required|string',
            'txnid'=>'sometimes|nullable|string',
            'leader'=>'sometimes|nullable|integer',
        ]);
        if(empty($request->txnid)){
            $txnid = 'Paypal';
        }else{
            $txnid = $request->txnid;
        }
        $activation = new Activation();
        $activation->dpid = Auth::id();
        $activation->number = $request->number;
        $activation->txnid = $txnid;
        $activation->leader = $request->leader;
        $activation->status = 0;
        $activation->save();

        return redirect()->back()->with('success', 'Success!!');
    }
	
}

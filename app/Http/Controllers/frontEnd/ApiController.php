<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function postBackCPA(Request $request){
        DB::table('donwload_survey')
            ->insert([
                'campaign_id'=>$request->campaign_id,
                'campaign_name'=>$request->campaign_name,
                'userid'=>$request->subid,
                'virtual_amount'=>$request->virtual_currency/1000000,
            ]);

        $user = DB::table('income_valley')
            ->where('userid', $request->subid)
            ->get();

        if (count($user)>0){
            DB::table('income_valley')
                ->where('userid', $request->subid)
                ->update([
                    'selfdownload_survey'=>$user[0]->selfdownload_survey + $request->virtual_currency/1000000,
                ]);
        }else{
            DB::table('income_valley')
                ->insert([
                    'userid'=>$request->subid,
                    'selfdownload_survey'=>$request->virtual_currency/1000000,
                ]);
        }

        return redirect('/apps-download');
    }
}

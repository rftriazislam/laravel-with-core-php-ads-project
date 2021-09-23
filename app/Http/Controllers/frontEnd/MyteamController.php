<?php

namespace App\Http\Controllers\frontEnd;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyteamController extends Controller
{
    public function showTeam($level, $id){
        $users = DB::table('users')
            ->join('earnings', 'earnings.userid', '=', 'users.id')
            ->join('ranks', 'ranks.userid', '=', 'users.id')
            ->join('levels', 'levels.userid', '=', 'users.id')
            ->where('users.sponsorid', $id)
            ->select('users.*', 'earnings.joining_income', 'earnings.referral_income', 'earnings.others_income', 'ranks.rank', 'levels.total')
            ->get();

        if ($level == 11 || count($users)== 0){
            return redirect()->back();
        }else{
            return view('frontEnd.publisher.myTeam.showTeam',[
                'users'=>$users,
                'level'=>$level,
            ]);
        }
    }


}

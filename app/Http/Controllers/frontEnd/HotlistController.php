<?php

namespace App\Http\Controllers\frontEnd;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HotlistController extends Controller
{
    public function index(){
        $latestSignups = User::orderBy('id', 'desc')
            ->limit(30)
            ->get();

        $maxTeams = DB::table('levels')
            ->join('users','levels.userid', '=', 'users.id')
            ->select('levels.total', 'users.id', 'users.name', 'users.country')
            ->orderBy('levels.total', 'desc')
            ->limit(30)
            ->get();

        $ranks = DB::table('ranks')
            ->join('users','ranks.userid', '=', 'users.id')
            ->select('ranks.rank', 'users.id', 'users.name', 'users.country')
            ->where('rank', 'like', '%bronze%')
            ->orderBy('ranks.updated_at', 'desc')
            ->limit(30)
            ->get();


        return view('frontEnd.publisher.hotlist.showHotlist',[
            'latestSignups'=>$latestSignups,
            'maxTeams'=>$maxTeams,
            'ranks'=>$ranks,
        ]);
    }
}

<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PpdController extends Controller
{
    public function ppd(){
        return view('frontEnd.publisher.ppd');
    }
    public function ppdLinks($ppdName){
        $links = DB::table('ppd_links')
            ->where('type', $ppdName)
            ->where('status', 1)
            ->get();
        return view('frontEnd.publisher.singlePPD', ['links'=>$links]);
    }
}

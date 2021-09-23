<?php

namespace App\Http\Controllers\frontEnd;

use App\Earning;
use App\Level;
use App\Rank;
use App\TodaysUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function insert()
    {
        $users = User::all();
        foreach ($users as $user) {
            $this->showDashboard($user->id);
        }
    }

    public function showDashboard($id)
    {
        $level1_percent = number_format(0.388888 * (40 / 100), 6);
        $level2_4_percent = number_format(0.388888 * (10 / 100), 6);
        $level5_10_percent = number_format(0.388888 * (5 / 100), 6);

       $perUserLevel = Level::where('userid', $id)
            ->first();
       $total = ($perUserLevel->level1 *$level1_percent)
           +(($perUserLevel->level2+$perUserLevel->level3+$perUserLevel->level4)*$level2_4_percent)
       +(($perUserLevel->level5+$perUserLevel->level6+$perUserLevel->level7+$perUserLevel->level8+$perUserLevel->level9+$perUserLevel->level10)*$level5_10_percent);
        Earning::create([
            'userid'=> $id,
            'joining_income'=> 1,
            'referral_income'=> $total,
            'others_income'=> 0,
            'approved_income'=> 0,
        ]);
    }
}

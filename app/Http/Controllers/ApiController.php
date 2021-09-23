<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function shoppingCalculation($userid, $amount){
        $selfuser = DB::table('shopping')
            ->where('userid', $userid)
            ->first();
        if (count($selfuser) > 0){
            DB::table('shopping')
                ->where('userid', $userid)
                ->update([
                    'selfshopping'=>$selfuser->selfshopping + $amount,
                ]);
            $this->shoppingUpLevel($userid, $amount);
        }else{
            DB::table('shopping')
                ->insert([
                    'userid'=>$userid,
                    'selfshopping'=>$amount,
                ]);
            $this->shoppingUpLevel($userid, $amount);
        }
    }

    protected function shoppingUpLevel($userid, $amount){
        $level_user = DB::table('upline_level')
            ->where('userid', $userid)
            ->first();

        if ($level_user->level1 != 0){
            $this->insertUpLevelOnShopping($level_user->level1, 'lv1shopping', 8/100*$amount);
        }
        if ($level_user->level2 != 0){
            $this->insertUpLevelOnShopping($level_user->level2, 'lv2shopping', 8/100*$amount);
        }
        if ($level_user->level3 != 0){
            $this->insertUpLevelOnShopping($level_user->level3, 'lv3shopping', 8/100*$amount);
        }
        if ($level_user->level4 != 0){
            $this->insertUpLevelOnShopping($level_user->level4, 'lv4shopping', 8/100*$amount);
        }
        if ($level_user->level5 != 0){
            $this->insertUpLevelOnShopping($level_user->level5, 'lv5shopping', 8/100*$amount);
        }

        if ($level_user->level6 != 0){
            $this->insertUpLevelOnShopping($level_user->level6, 'lv6shopping', 4/100*$amount);
        }

        if ($level_user->level7 != 0){
            $this->insertUpLevelOnShopping($level_user->level7, 'lv7shopping', 4/100*$amount);
        }

        if ($level_user->level8 != 0){
            $this->insertUpLevelOnShopping($level_user->level8, 'lv8shopping', 4/100*$amount);
        }

        if ($level_user->level9 != 0){
            $this->insertUpLevelOnShopping($level_user->level9, 'lv9shopping', 4/100*$amount);
        }

        if ($level_user->level10 != 0){
            $this->insertUpLevelOnShopping($level_user->level10, 'lv10shopping', 4/100*$amount);
        }

    }
    protected function insertUpLevelOnShopping($userid, $level, $commission){
        $selfuser = DB::table('shopping')
            ->where('userid', $userid)
            ->first();
        if (count($selfuser) > 0){
            DB::table('shopping')
                ->where('userid', $userid)
                ->update([
                    $level=>$selfuser->$level + $commission,
                ]);
        }else{
            DB::table('shopping')
                ->insert([
                    'userid'=>$userid,
                    $level => $commission,
                ]);
        }
    }

    public function testAll(){
		ini_set('memory_limit', '2048M');
        $tests = DB::table('users')
            ->get();
        foreach ($tests as $test){
            $user = DB::table('user_details')
                ->where('userid', $test->id)
                ->first();
            if (count($user) == 0){
                DB::table('user_details')
                    ->insert([
                        'userid'=> $test->id,
                    ]);
            }
        }
    }
	public function usersAll(Request $r){
	
	}


}

<?php

namespace App\Http\Controllers\Auth;

use App\Earning;
use App\Level;
use App\MonthsUser;
use App\Rank;
use App\TodaysUser;
use App\User;
use App\Http\Controllers\Controller;
use App\UserDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Transanction;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'sponsorid' => 'required|exists:users,id|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phonenumber' => 'required',
            'check' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // new add
        $payment = Transanction::where('email', $data['email'])->where('phone', $data['phonenumber'])->where('transaction_status', 'Success')->first();


        $countryname = explode('(', $data['countryname']);
        $addUser =  User::create([
            'name' => $data['name'],
            'sponsorid' => $data['sponsorid'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['countryname'],
            'phonenumber' => $data['phonenumber'],
            'active' => (empty($payment)) ? 0 : 1, //new add
            'created_at' => Carbon::now(),
        ]);

        Rank::create([
            'userid' => $addUser->id,
            'rank' => 'Member',
            'target_rank' => 'Bronze',
        ]);

        Earning::create([
            'userid' => $addUser->id,
            'joining_income' => 1,
            'referral_income' => 0,
            'others_income' => 0,
            'approved_income' => 0,
        ]);

        UserDetails::create([
            'userid' => $addUser->id,
        ]);

        Level::create([
            'userid' => $addUser->id,
        ]);

        TodaysUser::create([
            'userid' => $addUser->id,
        ]);

        MonthsUser::create([
            'userid' => $addUser->id,
        ]);
        $level1 = 0;
        $level2 = 0;
        $level3 = 0;
        $level4 = 0;
        $level5 = 0;
        $level6 = 0;
        $level7 = 0;
        $level8 = 0;
        $level9 = 0;


        if ($data['sponsorid'] != '') {
            $level1 = $this->uplineTableUpdate($data['sponsorid'], 1);
        }

        if ($level1 != 0) {
            $level2 = $this->uplineTableUpdate($level1, 2);
        }
        if ($level2 != 0) {
            $level3 = $this->uplineTableUpdate($level2, 3);
        }
        if ($level3 != 0) {
            $level4 = $this->uplineTableUpdate($level3, 4);
        }
        if ($level4 != 0) {
            $level5 = $this->uplineTableUpdate($level4, 5);
        }
        if ($level5 != 0) {
            $level6 = $this->uplineTableUpdate($level5, 6);
        }
        if ($level6 != 0) {
            $level7 = $this->uplineTableUpdate($level6, 7);
        }
        if ($level7 != 0) {
            $level8 = $this->uplineTableUpdate($level7, 8);
        }

        if ($level8 != 0) {
            $level9 = $this->uplineTableUpdate($level8, 9);
        }
        if ($level9 != 0) {
            $level10 = $this->uplineTableUpdate($level9, 10);
        }
        return $addUser;
    }

    public function uplineTableUpdate($sponsoreId, $level)
    {

        $level1_percent = number_format(0.388888 * (40 / 100), 6);
        $level2_4_percent = number_format(0.388888 * (10 / 100), 6);
        $level5_10_percent = number_format(0.388888 * (5 / 100), 6);

        $nextLevel = User::where('id', $sponsoreId)
            ->first();

        $refIncome = Earning::where('userid', $sponsoreId)
            ->first();

        $levelTable = Level::where('userid', $sponsoreId)
            ->first();

        $todayTable = TodaysUser::where('userid', $sponsoreId)
            ->whereBetween('updated_at', [
                Carbon::now()->setTime(0, 0)->format('Y-m-d H:i:s'),
                Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
            ])
            ->first();

        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        $monthTable = MonthsUser::where('userid', $sponsoreId)
            ->whereBetween('updated_at', [
                Carbon::now()->setDate($year, $month, 1)
                    ->setTime(0, 0)->format('Y-m-d H:i:s'),
                Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
            ])
            ->first();

        if ($level == 1) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level1_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level1' => $levelTable->level1 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 1,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => $todayTable->level1 + 1,
                    ]);
            }



            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 1,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => $monthTable->level1 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 2) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level2_4_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level2' => $levelTable->level2 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 1,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level2' => $todayTable->level2 + 1,
                    ]);
            }

            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 1,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level2' => $monthTable->level2 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 3) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level2_4_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level3' => $levelTable->level3 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 1,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level3' => $todayTable->level3 + 1,
                    ]);
            }



            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 1,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level3' => $monthTable->level3 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 4) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level2_4_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level4' => $levelTable->level4 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 1,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level4' => $todayTable->level4 + 1,
                    ]);
            }

            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 1,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level4' => $monthTable->level4 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 5) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level5_10_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level5' => $levelTable->level5 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 1,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level5' => $todayTable->level5 + 1,
                    ]);
            }



            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 1,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level5' => $monthTable->level5 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 6) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level5_10_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level6' => $levelTable->level6 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 1,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level6' => $todayTable->level6 + 1,
                    ]);
            }



            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 1,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level6' => $monthTable->level6 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 7) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level5_10_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level7' => $levelTable->level7 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 1,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level7' => $todayTable->level7 + 1,
                    ]);
            }


            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 1,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level7' => $monthTable->level7 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }
        if ($level == 8) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level5_10_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level8' => $levelTable->level8 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 1,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level8' => $todayTable->level8 + 1,
                    ]);
            }


            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 1,
                        'level9' => 0,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level8' => $monthTable->level8 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 9) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level5_10_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level9' => $levelTable->level9 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 1,
                        'level10' => 0,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level9' => $todayTable->level9 + 1,
                    ]);
            }


            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 1,
                        'level10' => 0,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level9' => $monthTable->level9 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }

        if ($level == 10) {
            Earning::where('userid', $sponsoreId)
                ->update([
                    'referral_income' => floatval($refIncome->referral_income) + $level5_10_percent,
                ]);

            Level::where('userid', $sponsoreId)
                ->update([
                    'level10' => $levelTable->level10 + 1,
                    'total' => $levelTable->total + 1,
                ]);

            if ($todayTable == '') {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 1,
                    ]);
            } else {
                TodaysUser::where('userid', $sponsoreId)
                    ->update([
                        'level10' => $todayTable->level10 + 1,
                    ]);
            }


            if ($monthTable == '') {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level1' => 0,
                        'level2' => 0,
                        'level3' => 0,
                        'level4' => 0,
                        'level5' => 0,
                        'level6' => 0,
                        'level7' => 0,
                        'level8' => 0,
                        'level9' => 0,
                        'level10' => 1,
                    ]);
            } else {
                MonthsUser::where('userid', $sponsoreId)
                    ->update([
                        'level10' => $monthTable->level10 + 1,
                    ]);
            }

            return $nextLevel->sponsorid;
        }
    }
}
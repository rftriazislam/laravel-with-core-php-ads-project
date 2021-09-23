<?php

namespace App\Http\Controllers\frontEnd;

use App\Earning;
use App\Level;
use App\User;
use App\UserDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;


class UserDetailsController extends Controller
{
    public function index()
    {
        return view('frontEnd.publisher.myprofile.pass');
    }
    public function checkProfile(Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        if (Auth::guard()->attempt(['email' => Auth::user()->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->intended('/profile');
        }
        return redirect()->back()->with('message', 'Password Wrong');
    }
    public function showProfile()
    {

        $userDeatils = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.userid')
            ->select('users.*', 'user_details.*')
            ->where('users.id', Auth::user()->id)
            ->first();

        $totalTeam = Level::where('userid', Auth::user()->id)
            ->first();
        $totalEarn = Earning::where('userid', Auth::user()->id)
            ->first();

        return view('frontEnd.publisher.myprofile.showProfile', [
            'userDeatils' => $userDeatils,
            'totalTeam' => $totalTeam,
            'totalEarn' => $totalEarn,
        ]);
    }

    public function updateProfile(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'phonenumber' => $request->phonenumber,
                'country' => $request->country,
            ]);

        if (empty($request->image)) {

            $imageUrl = $request->previousImg;
        } else {
            $this->validate($request, [
                'image' => 'image',
            ]);

            /*$sliderImage = $request->file('image');
            $imageName = date('Ymdhsa').$sliderImage->getClientOriginalName();
            $uploadPath = 'public/CustomerProfileImage/'.date('Y').'/'.date('m').'/'.date('d');
            $sliderImage->move($uploadPath, $imageName);
            Image::make($sliderImage->getRealPath())
                ->resize(100, 50)
                ->save($uploadPath.'/'.$imageName);
            $imageUrl = $uploadPath.'/'.$imageName;*/
            $image = $request->file('image');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();


            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
            $imageUrl = 'public/thumbnail/' . $input['imagename'];
        }
        if ($request->phone_no_visivility == '') {
            $chek = 0;
        } else {
            $chek = 1;
        }
        UserDetails::where('userid', Auth::user()->id)
            ->update([
                'city' => $request->city,
                'image' => $imageUrl,
                'town' => $request->town,
                'village' => $request->village,
                'house' => $request->house,
                'division' => $request->division,
                'birthday' => Carbon::parse($request->birthday),
                'gender' => $request->gender,
                'nid' => $request->nid,
                'nominee' => $request->nominee,
                'relation' => $request->relation,
                'phone_no_visivility' => $chek,
            ]);
        return redirect('/profile')->with('message', 'Profile Updated');
    }
}
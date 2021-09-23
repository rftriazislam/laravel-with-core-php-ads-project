<?php

namespace App\Http\Controllers\frontEnd;

use App\Marchent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MarchentController extends Controller
{
    public function registerForm(){
        return view('frontEnd.marchent.registerForm');
    }

    public function register(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:marchents',
            'password' => 'required|min:6|confirmed',
            'phonenumber' => 'required',
            'product' => 'required',
            'check' => 'required',
        ]);

        Marchent::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phonenumber'=>$request->phonenumber,
            'country'=>$request->countryname,
            'type'=>$request->type,
            'company'=>$request->company,
            'product'=>$request->product,
        ]);
        return redirect('/marchent')->with('message', 'We will contact wil you personally');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class OrbitalApiController extends Controller
{
     public function __construct(){
	    $this->middleware('guest'); 
	 }
	public function usersAll(Request $r){
		ini_set('memory_limit', '2048M');
	  var_dump(User::all());
	}


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DreamployApiController extends Controller
{
	
 function __construct(){
	 $data = [];
	 
 }
 function uplineId($id){
	 ini_set('memory_limit', '2048M');
       $upline = DB::table('upline_level')->where('userid',$id)->get();
	   $data = [];
	   foreach($upline as $up){
		 $data[] = $up->level1; 
		 $data[] = $up->level2; 
		 $data[] = $up->level3; 
		 $data[] = $up->level4; 
		 $data[] = $up->level5; 
		 $data[] = $up->level6; 
		 $data[] = $up->level7; 
		 $data[] = $up->level8; 
		 $data[] = $up->level9; 
		 $data[] = $up->level10; 
         		 
	   }
	   return response()->json(['upline'=>$data]);
 }
 
}

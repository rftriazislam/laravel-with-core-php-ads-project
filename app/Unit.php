<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Earning;
use App\LikeCount;
use App\Comments;
use App\Views;
use App\Share;


use Validator;
use Auth;
use DB;
class Unit{
	public static function get($id){
		return 0;
		return json_decode(file_get_contents('https://orbittimes.com/api/v1/'.$id.'/$2y$10$8teNj0vD2vNEb1ZuzvNehe9nY7.NcUxUwbIe7exRuQTRQkyR6N5F2'));
	}
	
	public static function uplineId(){
		 $levels = [];
		 $level = DB::table('upline_level')
		               ->where('userid',Auth::id())
					   ->first();
		 $levels[] = $level->level1;
		 $levels[] = $level->level2;
		 $levels[] = $level->level3;
		 $levels[] = $level->level4;
		 $levels[] = $level->level5;
		 $levels[] = $level->level6;
		 $levels[] = $level->level7;
		 $levels[] = $level->level8;
		 $levels[] = $level->level9;
		 $levels[] = $level->level10;
		 return implode(',',$levels);
	}
	public static function totalGet(){
		//return 'https://orbittimes.com/api/v1/total/'.self::uplineId().'/$2y$10$8teNj0vD2vNEb1ZuzvNehe9nY7.NcUxUwbIe7exRuQTRQkyR6N5F2';
		return json_decode(file_get_contents('https://orbittimes.com/api/v1/total/'.self::uplineId().'/$2y$10$8teNj0vD2vNEb1ZuzvNehe9nY7.NcUxUwbIe7exRuQTRQkyR6N5F2'));
	}
	public static function blogGet($id){
		return file_get_contents("https://dreamploy.net/api/v1/".$id);
	}
	public static function totalBlog(){
		return file_get_contents("https://dreamploy.net/api/v1/total/".self::uplineId());
	}
	
}
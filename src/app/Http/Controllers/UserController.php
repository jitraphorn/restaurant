<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\user as user; // add model
use Request;

class UserController extends Controller {

    public function index() {
        return view('admin.index');
    }

   public function login(){
         return view('admin.login');
   }

   public function checkLogin(Request $request){
   	$data = $request::all();
		if(!empty($data['username']) && !empty($data['password'])){
			
			$checkUser = user::where('username',$data['username'])->where('password',md5($data['password']))->count() > 0;
			if($checkUser){

				$users = user::view(array(('username',$data['username'])->where('password',md5($data['password']))->first());
				
				$_SESSION['auth'] = $users;

				return ["result"=>true];
				

			}else{
				return ["result"=>false];
				
			}
		}else{
			return ["result"=>false];
		}
   		
   		return $users;
   }

}

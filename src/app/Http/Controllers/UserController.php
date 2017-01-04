<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\user as user; // add model
use Request;

class UserController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	
	public function login(){
		return view('admin.login');
	}

	public function checkLogin(Request $request){
		$data = $request::all();
		if(!empty($data['username']) && !empty($data['password'])){
			
			$checkUser = user::where('username',$data['username'])->where('password',md5($data['password']))->count() > 0;
			if($checkUser){

				$users = user::where('username',$data['username'])->where('password',md5($data['password']))->first();
				
				$_COOKIE['auth'] = $users;
				return ["result"=>true,'detail'=>$users];
				

			}else{
				return ["result"=>false];
				
			}
		}else{
			return ["result"=>false];
		}

		return $users;
	}
	public function index(){
		return view('admin.user.index');
	}

	public function lists(){
		return user::get();
	}

	public function form($id = NULL){
		if($id){
			$data = user::where('id',$id)->first();
		}else{
			$data = NULL;
		}

		return view('admin.user.form',array("data"=>$data));
		
	}

	public function add(Request $request){
		$data = $request::all();
		if(!isset($data['id'])){
			$result = user::insert($data);
		}else{
			$table = user::where('id', $data['id']);
            $result = $table->update($data);
		}
		return ['result'=>$result];
	}

	public function delete($id = NULL){
		if($id){
			$result = user::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}
}

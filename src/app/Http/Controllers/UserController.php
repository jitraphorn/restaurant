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
   	return $data;
   }
}

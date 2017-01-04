<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\menu as menu; // add model
use Request;

class MenuController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		return view('admin.menu.index');
	}

	public function form($id = NULL){
		if($id){
			$data = menu::where('id',$id)->first();
		}else{
			$data = NULL;
		}

		return view('admin.menu.form',array("data"=>$data));
		
	}

	public function lists(){
		return menu::get();
	}

	public function add(Request $request){
		$data = $request::all();
		if(!$data['id']){
			$result = menu::insert($data); 
		}else{
			$table = menu::where('id', $data['id']);
            $result = $table->update($data);
		}
		return ['result'=>$result];
	}

	public function delete($id = NULL){
		if($id){
			$result = menu::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}
}

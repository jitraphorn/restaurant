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

	public function view($id){
		return menu::where('id',$id)->first();
	}

	public function add(Request $request){
		$data = $request::all();
		if(isset($data['image'])){
			$data['image'] = $data['image'][0];
		}
		if(!isset($data['id'])){
			$id = menu::insertGetId($data);
			$result = $id?1:0;
		}else{
			$table = menu::where('id', $data['id']);
			if(!isset($data['image'])){
				unset($data['image']);
			}
            $result = $table->update($data);
            $id = $data['id'];
		}
		return ['result'=>$result,'id'=>$id];
	}

	public function delete($id = NULL){
		if($id){
			$result = menu::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}
}

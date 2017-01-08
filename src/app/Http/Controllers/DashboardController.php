<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\room as room; // add model
use Request;

class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		return view('admin.dashboard.index');
	}

	public function lists(){
		return room::get();
	}

	public function form($id = NULL){
		if($id){
			$data = room::where('id',$id)->first();
		}else{
			$data = NULL;
		}

		return view('admin.room.form',array("data"=>$data));
		
	}

	public function add(Request $request){
		$data = $request::all();
		if(!$data['id']){
			$result = room::insert($data); 
		}else{
			$table = room::where('id', $data['id']);
            $result = $table->update($data);
		}
		return ['result'=>$result];
	}

	public function delete($id = NULL){
		if($id){
			$result = room::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}
}

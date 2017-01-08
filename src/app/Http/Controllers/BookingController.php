<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\booking as booking; // add model
use Request;

class BookingController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		return view('admin.books.index');
	}

	public function lists(){
		return booking::get();
	}

	public function form($id = NULL){
		if($id){
			$data = booking::where('id',$id)->first();
		}else{
			$data = NULL;
		}

		return view('admin.books.form',array("data"=>$data));
		
	}

	public function add(Request $request){
		$data = $request::all();
		if(!$data['id']){
			$result = booking::insert($data); 
		}else{
			$table = booking::where('id', $data['id']);
            $result = $table->update($data);
		}
		return ['result'=>$result];
	}

	public function delete($id = NULL){
		if($id){
			$result = booking::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}
}

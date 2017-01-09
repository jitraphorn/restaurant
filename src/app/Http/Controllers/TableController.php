<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\table as table; // add model
use Request;

class TableController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		return view('admin.table.index');
	}

	public function lists(){
		return table::get();
	}

	public function add(Request $request){
		$data = $request::all();
		if(!isset($data['id'])){
			$result = table::insert($data); 
		}else{
			$table = table::where('id', $data['id']);
            $result = $table->update($data);
		}
		return ['result'=>$result];
	}

	public function delete($id = NULL){
		if($id){
			$result = table::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}
}

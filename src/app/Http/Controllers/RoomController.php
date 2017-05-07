<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\room as room; // add model
use App\room_image as room_image; // add model
use Request;

class RoomController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		return view('admin.room.index');
	}

	public function lists(){
		return room::get();
	}

	public function listsImage($id = NULL){
		return room_image::where('room_id',$id)->get();
	}

	public function form($id = NULL){
		if($id){
			$data = room::where('id',$id)->first();
			$data['image'] = room_image::where('room_id',$id)->get();
		}else{
			$data = NULL;
		}
		
		return view('admin.room.form',array("data"=>$data));
		
	}

	public function add(Request $request){
		$data = $request::all();
		$image = [];
		if(isset($data['image'])){
			$image = $data['image'];
		}
		unset($data['image']);
		if(!isset($data['id'])){
			$id = room::insertGetId($data); 
		}else{
			$table = room::where('id', $data['id']);
            $table->update($data);
            $id = $data['id'];
		}

		$count = count($image);
		$i = 0;
		if($id && $count > 0){
			foreach ($image as $key => $value) {
				$array = ["room_id"=>$id,"path"=>$value];
				room_image::insert($array);
				$i++;
			}
		}

		if($count == $i && $id){
			return ['result'=>true];
		}else{
			return ['result'=>false];
		}

	}

	public function delete($id = NULL){
		if($id){
			room_image::where('room_id',$id)->delete();
			$result = room::where('id', $id)->delete();
			return ['result'=>$result];
		}
	}

	public function ImageDelete($id = NULL){
		if($id){
			$result = room_image::where('id',$id)->delete();
			return ['result'=>$result];
		}
	}
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\booking as booking; // add model
use App\customer as customer; // add model
use App\room as room; // add model
use Request;

class BookingController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		return view('admin.books.index');
	}

	public function lists(){
		$booking = booking::orderBy('id','desc')->get();
		foreach ($booking as $key => $value) {
			$booking[$key]['customer_detail'] = customer::where('id',$value['customer_id'])->first();
			$booking[$key]['room_detail'] = room::where('id',$value['room_id'])->select('title')->first();
		}
		return $booking;
	}

	public function form($id = NULL){
		if($id){
			$data = [];
			$data['booking'] = booking::where('id',$id)->first();
			$data['cusData'] = customer::where('id',$data['booking']['customer_id'])->first();
			
		}else{
			$data = NULL;
		}


		$roomList = room::get();
		return view('admin.books.form',array("data"=>$data, "roomList"=>$roomList));
		
	}

	public function add(Request $request){
		$data = $request::all();
		if($data['booking']['id']){
				booking::where('id',$data['booking']['id'])->update($data['booking']);
				return ['result'=>true];
		}else{
			$customer = customer::where('email',$data['cusData']['email'])->select('id')->first();
			if(!$customer){
				$customer_id = customer::insertGetId($data['cusData']);
			}else{
				customer::where('email',$data['cusData']['email'])->update($data['cusData']);
				$customer_id = $customer->id;
			}

		//- manage order
			$data['booking']['customer_id'] = $customer_id;
			$data['booking']['code'] = "BK".date('mdHis');
			$booking_id = booking::insertGetId($data['booking']);
			return ['result'=>$booking_id];
		}
	}

	public function delete($id = NULL){
		if($id){
			$result = booking::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}

	public function update(Request $request){
		$data = $request::all();
		$result = booking::where('id',$data['id'])->update($data);
		return ['result'=>$result];
	}
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\order as order; // add model
use App\customer as customer; // add model
use App\table as table; // add model
use App\menu_list as menu_list;
use Request;

class OrderController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		return view('admin.order.index');
	}

	public function lists(){
		$order = order::get();
		foreach ($order as $key => $value) {
			$order[$key]['customer_detail'] = customer::where('id',$value['customer_id'])->first();
			$order[$key]['table_detail'] = table::where('id',$value['table_id'])->first();
		}
		return $order;
	}

	public function add(Request $request){
		$data = $request::all();

		//- manage customer
		$customer = customer::where('email',$data['customer']['email'])->select('id')->first();
		if(!$customer){
			$customer_id = customer::insertGetId($data['customer']);
		}else{
			customer::where('email',$data['customer']['email'])->update($data['customer']);
			$customer_id = $customer->id;
		}

		//- update table status
		// table::where('id',$data['order']['table_id'])->update(['status'=>2]);

		//- manage order
		$data['order']['customer_id'] = $customer_id;
		$order_id = order::insertGetId($data['order']);
		return ['result'=>$order_id];
	}

	public function addMenuList(Request $request){
		$data = $request::all();
		foreach ($data['data'] as $key => $value) {
			menu_list::insert($value);
		}

		return ['result'=>true];
		
	}

	public function delete($id = NULL){
		if($id){
			$result = order::where('id', $id)->delete();
			return ['result'=>$result];
		}
		
	}
}

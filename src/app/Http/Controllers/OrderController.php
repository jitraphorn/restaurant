<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\order as order; // add model
use App\customer as customer; // add model
use App\menu_list as menu_list;
use App\menu as menu;
use Request;

class OrderController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$data =[];
		return view('admin.order.index');
	}

	public function lists(){
		$order = order::orderBy('id','desc')->get();
		foreach ($order as $key => $value) {

			$order[$key]['customer_detail'] = customer::where('id',$value['customer_id'])->first();
			$menu_list = menu_list::where('order_id',$value['id'])->get();

			foreach ($menu_list as $key2 => $value2) {
				$menu = menu::where('id',$value2['menu_id'])->first();
				$menu_list[$key2]['menu_detail'] = $menu;
			}

			$order[$key]['menu_list'] = $menu_list;
		}
		return $order;
	}

	public function add(Request $request){
		$data = $request::all();
		$json = file_get_contents("config.json");
		$config =  json_decode($json, TRUE);

		if(!$config['order_status']){
			return ['result'=>false]; 
		}

		$data['order']['count_table'] = ceil($data['order']['person'] / 12);

		$orderDate = order::where('date',$data['order']['date'])->where('status',1)->get();

		$countTable = 0;
		foreach ($orderDate as $key => $value) {
			$countTable += $value->count_table;
		}

		if($countTable >= $config['max_table'] || $countTable+$data['order']['count_table'] > $config['max_table']){
			return ['result'=>false];
		}
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
		return ['result'=>$order_id, "countTable"=>$data['order']['count_table']];
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

	public function update(Request $request){
		$data = $request::all();
		$result = order::where('id',$data['id'])->update($data);
		return ['result'=>$result];
	}

	public function form($id = NULL){
		if($id){
			$data = [];
			$data['order'] = order::where("id",$id)->first();
			$data['customer_detail'] = customer::where("id",$data['order']['customer_id'])->first();
			$menulist = menu_list::where("order_id",$data['order']['id'])->get();
			$data['menu_list'] = [];
			if($menulist){
				foreach ($menulist as $key => $value) {
					$data['menu_list'][$value['menu_id']] = $value['amount'];
				}
			}

		}else{
			$data = NULL;
		}

		$listMenu = menu::get();
		// return $data;
		return view('admin.order.form',array("data"=>$data, "listMenu"=>$listMenu));
	}

	public function addbackend(Request $request){
		$data = $request::all();
		//- manage customer

		if(!$data['order']['id']){
			$json = file_get_contents("config.json");
			$config =  json_decode($json, TRUE);

			if(!$config['order_status']){
				return ['result'=>false]; 
			}

			$data['order']['count_table'] = ceil($data['order']['person'] / 12);

			$orderDate = order::where('date',$data['order']['date'])->where('status',1)->get();

			$countTable = 0;
			foreach ($orderDate as $key => $value) {
				$countTable += $value->count_table;
			}

			if($countTable >= $config['max_table'] || $countTable+$data['order']['count_table'] > $config['max_table']){
				return ['result'=>false];
			}
			$customer = customer::where('email',$data['customer_detail']['email'])->select('id')->first();
			if(!$customer){
				$customer_id = customer::insertGetId($data['customer_detail']);
			}else{
				customer::where('email',$data['customer_detail']['email'])->update($data['customer_detail']);
				$customer_id = $customer->id;
			}

			//- manage order
			$data['order']['customer_id'] = $customer_id;
			$data['order']['date'] = $data['order']['dateStr'];
			unset($data['order']['dateStr']);
			$order_id = order::insertGetId($data['order']);
			
			foreach ($data['menu_list'] as $key => $value) {
				//$value->order_id = $order_id;
				if($value > 0){
					$arr = ["order_id"=>$order_id, "menu_id"=>$key, "amount"=>$value];
					menu_list::insert($arr);
				}
			}			
		}else{
			$data['order']['date'] = $data['order']['dateStr'];
			unset($data['order']['dateStr']);
			order::where('id',$data['order']['id'])->update($data['order']);
			menu_list::where('order_id',$data['order']['id'])->delete();
			foreach ($data['menu_list'] as $key => $value) {
				//$value->order_id = $order_id;
				if($value > 0){
					$arr = ["order_id"=>$data['order']['id'], "menu_id"=>$key, "amount"=>$value];
					menu_list::insert($arr);
				}
			}
		}

		return ['result'=>true];

	}
}

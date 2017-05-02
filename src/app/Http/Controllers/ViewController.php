<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use App\menu;
use App\room;
use App\room_image;

class ViewController extends Controller {
	public function home() {
		$data = [];
		$data['menu'] = menu::limit(6)->get();
		return view('home.index',array('data' => $data)); 
	}

	public function room() {
		$data = [];
		$data['room'] = room::get();
		foreach ($data['room'] as $key => $value) {
			$data['room'][$key]['image'] = room_image::where('room_id', $value->id)->get();
		}
		return view('room.index',array('data' => $data)); 
	}

	public function food_menu() {
		$data = [];
		$data['menu'] = menu::get();
		return view('food.index',array('data' => $data)); 
	}

	public function reservation() {
		return view('order.index'); 
	}
}
<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller {
	public function lists() {
		$json = file_get_contents("config.json");
		return $config =  json_decode($json, TRUE);
	}

	public function updates(Request $request){
		$data = $request::all();
		$data = json_encode($data);
		file_put_contents("config.json", $data);
		return ["result"=>true];
	}
}
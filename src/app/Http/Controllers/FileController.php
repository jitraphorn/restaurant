<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogSystemController;
use App\room as room; // add model
use Request;

class FileController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function add(Request $request){
		$data = $request::all();
		$folder = $data['folder'];
		$files = $_FILES['image'];
		$arrImg = [];
		foreach ($files['name'] as $key => $value) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 6; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}

			$path_save = "assets/images/upload/".$folder."/";

			$name = $randomString."-".$files['name'][$key];
			$tmp_name = $files['tmp_name'][$key];
			move_uploaded_file($tmp_name,$path_save.$name);
			array_push($arrImg, $path_save.$name);
		}

		return $arrImg;

	}
}

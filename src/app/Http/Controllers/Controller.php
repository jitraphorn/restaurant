<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public $regex = array("admin/login","admin/checkLogin");

    public function __construct(){
    	$currentPath = Route::getFacadeRoot()->current()->uri();
    	$adminRoute = substr($currentPath, 0, 5);

    	if($adminRoute == "admin"){
            if (!isset($_COOKIE['auth'])) {
                $currentPath = Route::getFacadeRoot()->current()->uri();
                if(!array_search($currentPath,$this->regex)){
                    if($currentPath !== "admin/login"){
                        return redirect('/admin/login')->send();
                    }
                }

            }else{
                $data = json_decode($_COOKIE['auth']);
            }
    	}
    }
}

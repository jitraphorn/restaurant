<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/service', function () {
    return view('service.index');
});

Route::get('/admins/login', 'AdminController@login');
Route::get('/admins', 'AdminController@index');
Route::get('/admins/manage', function () {
    return view('admin.manage');
});

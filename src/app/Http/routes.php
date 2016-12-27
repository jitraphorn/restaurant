<?php
header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
Blade::setEscapedContentTags('{{%', '%}}');
Blade::setContentTags('{{{%', '%}}}');
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

Route::get('/admin/login', 'UserController@login');
Route::post('/admin/checkLogin', 'UserController@checkLogin');

Route::get('/admin', 'UserController@index');
Route::get('/admin/manage', 'UserController@manage');

Route::get('/admin/user', 'UserController@index');
Route::get('/admin/user/list', 'UserController@lists');
Route::get('/admin/user/form', 'UserController@form');
Route::get('/admin/user/form/{id}', 'UserController@form');
Route::post('/admin/user/add', 'UserController@add');
Route::get('/admin/user/delete/{id}', 'UserController@delete');
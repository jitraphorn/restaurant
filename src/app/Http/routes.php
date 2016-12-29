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

Route::get('/admin/customer', 'customerController@index');
Route::get('/admin/customer/list', 'customerController@lists');
Route::get('/admin/customer/form', 'customerController@form');
Route::get('/admin/customer/form/{id}', 'customerController@form');
Route::post('/admin/customer/add', 'customerController@add');
Route::get('/admin/customer/delete/{id}', 'customerController@delete');

Route::get('/admin/room', 'roomController@index');
Route::get('/admin/room/list', 'roomController@lists');
Route::get('/admin/room/form', 'roomController@form');
Route::get('/admin/room/form/{id}', 'roomController@form');
Route::post('/admin/room/add', 'roomController@add');
Route::get('/admin/room/delete/{id}', 'roomController@delete');

Route::get('/admin/menu', 'menuController@index');
Route::get('/admin/menu/list', 'menuController@lists');
Route::get('/admin/menu/form', 'menuController@form');
Route::get('/admin/menu/form/{id}', 'menuController@form');
Route::post('/admin/menu/add', 'menuController@add');
Route::get('/admin/menu/delete/{id}', 'menuController@delete');
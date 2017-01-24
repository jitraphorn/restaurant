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

//- backend
Route::get('/admin/login', 'UserController@login');
Route::post('/admin/checkLogin', 'UserController@checkLogin');

Route::get('/admin', 'DashboardController@index');
Route::get('/admin/manage', 'UserController@manage');

Route::get('/admin/user', 'UserController@index');
Route::get('/admin/user/list', 'UserController@lists');
Route::get('/admin/user/form', 'UserController@form');
Route::get('/admin/user/form/{id}', 'UserController@form');
Route::post('/admin/user/add', 'UserController@add');
Route::get('/admin/user/delete/{id}', 'UserController@delete');

Route::get('/admin/customer', 'CustomerController@index');
Route::get('/admin/customer/list', 'CustomerController@lists');
Route::get('/admin/customer/form', 'CustomerController@form');
Route::get('/admin/customer/form/{id}', 'CustomerController@form');
Route::post('/admin/customer/add', 'CustomerController@add');
Route::get('/admin/customer/delete/{id}', 'CustomerController@delete');

Route::get('/admin/room', 'RoomController@index');
Route::get('/admin/room/list', 'RoomController@lists');
Route::get('/admin/room/form', 'RoomController@form');
Route::get('/admin/room/form/{id}', 'RoomController@form');
Route::post('/admin/room/add', 'RoomController@add');
Route::get('/admin/room/delete/{id}', 'RoomController@delete');
Route::get('/admin/room/image/delete/{id}', 'RoomController@ImageDelete');
Route::get('/admin/room/image/list/{id}', 'RoomController@listsImage');

Route::get('/admin/menu', 'MenuController@index');
Route::get('/admin/menu/list', 'MenuController@lists');
Route::get('/admin/menu/form', 'MenuController@form');
Route::get('/admin/menu/form/{id}', 'MenuController@form');
Route::post('/admin/menu/add', 'MenuController@add');
Route::get('/admin/menu/delete/{id}', 'MenuController@delete');

Route::get('/admin/books', 'BookingController@index');
Route::get('/admin/books/list', 'BookingController@lists');
Route::get('/admin/books/form', 'BookingController@form');
Route::get('/admin/books/form/{id}', 'BookingController@form');
Route::post('/admin/books/add', 'BookingController@add');
Route::get('/admin/books/delete/{id}', 'BookingController@delete');

Route::get('/admin/table', 'TableController@index');
Route::get('/admin/table/list', 'TableController@lists');
Route::post('/admin/table/add', 'TableController@add');
Route::get('/admin/table/delete/{id}', 'TableController@delete');

Route::get('/admin/order', 'OrderController@index');
Route::get('/admin/order/list', 'OrderController@lists');
Route::get('/admin/order/form', 'OrderController@form');
Route::get('/admin/order/form/{id}', 'OrderController@form');
Route::post('/admin/order/add', 'OrderController@add');
Route::get('/admin/order/delete/{id}', 'OrderController@delete');

Route::post('/admin/file/add', 'FileController@add');

//- fontend
Route::get('/api/table/list', 'TableController@lists');
Route::post('/api/order/add', 'OrderController@add');
Route::post('/api/order/addMenuList', 'OrderController@addMenuList');
Route::get('/api/menu/list', 'MenuController@lists');
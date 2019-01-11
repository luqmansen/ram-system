<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function    () {
    return view('index');
});

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/history', 'AdminController@history');

Auth::routes();

Route::get('/sudosu', 'HomeController@index')->name('home');

Route::get('/manageRooms','ManageRoomsController@index');

// Route::get('/manageCostumers','ManageCostumersController@index');

Route::get('/manageReservations','ManageReservationsController@index');

Route::get('/history','HistoryController@index');

//cuma untuk nyoba---
Route::get('/user', function    () {
    return view('calendar');
});
//----

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/hoobla',function(){
    return view('hoobla');
});

Route::get('/roomDelete/{id}', 'ManageRoomsController@delete');
Route::get('/exportRoomTable', 'ManageRoomsController@export');
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


Route::get('/reservation', 'FormController@index');

Route::get('/reservation/customerform', function(){
    return view('reservation.customer-input');
});
Route::post('/reservationinput/customerform', 'FormController@store');

Route::get('/reservation/bookingform', function(){
    return view('reservation.booking-form');
});
Route::post('/reservationinput/bookingform', 'FormController@store1');


Route::get('/coba', function(){
    $name = DB::table('reservations')->select('id')->orderBy('created_at', 'desc')->first();
    return $customers->id;
});

// Route::get('/reservation/customerform' ,'FormController@create');

// Route::get('/reservation/bookingform' ,'FormController@create1');

// Route::resource('/reservation', 'FormController');

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/history', 'AdminController@history');

Auth::routes();

Route::get('/sudosu', 'HomeController@index')->name('home');

//cuma untuk nyoba---
Route::get('/user', function    () {
    return view('calendar');
});
//----

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

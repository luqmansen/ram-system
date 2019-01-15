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

Route::get('/', 'FormController@index'); // this return calendar as index

Route::get('/reservation/{day}/{month}/{year}', 'FormController@roomdetail');

Route::get('/reservation/customerform', function(){
    return view('reservation.customer-input');
});
Route::post('/reservationinput/customerform', 'FormController@store');

Route::get('/reservation/bookingform', function(){
    return view('reservation.booking-form');
});
Route::post('/reservationinput/bookingform', 'FormController@store1');

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/history', 'AdminController@history');

Auth::routes();

Route::get('/sudosu', 'HomeController@index')->name('home');

Route::get('/manageRooms','ManageRoomsController@index');

Route::get('/manageCostumers','ManageCostumersController@index');

Route::get('/manageReservations','ManageReservationsController@index');

Route::get('/history','HistoryController@index');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

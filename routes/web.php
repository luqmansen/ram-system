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


Route::get('/calendar', 'FormController@index'); // this return calendar as index

Route::get('/', 'IndexController@index');


Route::get('/reservation/{day}/{month}/{year}', 'FormController@roomdetail');

Route::get('/reservation/customerform', 'FormController@create');  // function disini untuk display customer input dengan method create
    
Route::post('/reservationinput/customerform', 'FormController@store');

Route::get('/reservation/bookingform', 'Formcontroller@create1');

Route::post('/reservationinput/bookingform', 'FormController@store1');

//////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/home', 'HomeController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/history', 'AdminController@history');

Auth::routes();

Route::get('/sudosu', 'HomeController@index')->name('home');

// Route::get('/manageReservations','ManageReservationsController@index');

// Route::get('/history','HistoryController@index');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/hoobla',function(){
    return view('hoobla');
});

//Manage Rooms
Route::get('/manageRooms','ManageRoomsController@index');
Route::post('/roomDelete', 'ManageRoomsController@delete');
Route::post('/roomsDelete', 'ManageRoomsController@deletes');
Route::post('/roomEdit', 'ManageRoomsController@edit');
Route::post('/roomAdd', 'ManageRoomsController@add');
Route::get('/exportRoomTable', 'ManageRoomsController@exportXls');
Route::get('/exportRoomPdf', 'ManageRoomsController@exportPdf');

//Manage Customers
Route::get('/manageCustomers','ManageCustomersController@index');
Route::post('/customerDelete', 'ManageCustomersController@delete');
Route::post('/customerDetail','ManageCustomersController@detail');
Route::post('/customersDelete', 'ManageCustomersController@deletes');
Route::get('/exportCustomersTable', 'ManageCustomersController@exportXls');
Route::get('/exportCustomersPdf', 'ManageCustomersController@exportPdf');

<<<<<<< HEAD
//History
Route::get('/history','HistoryController@index');
=======
>>>>>>> 50959d4404993152cf569070f3fe8a2f99d5dc00

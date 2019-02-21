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

// Route::match(['get','post'],'/', 'IndexController@index');

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@modalpost');
Route::post('/getDate', 'IndexController@getDate');

// Route::get('/reservation/{day}/{month}/{year}', 'FormController@roomdetail');
// Prevent back history middleware group
Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();

    ///////////////////////////////// Customer Form //////////////////////////////
    Route::get('/reservation/customerform/{day}/{month}/{year}/{room}', 'FormController@create');
    Route::post('/reservationinput/customerform', 'FormController@store');

    ///////////////////////////////// Booking Form //////////////////////////////
    Route::get('/reservation/bookingform/{day}/{month}/{year}/{room}', 'Formcontroller@create1');
    Route::post('/reservationinput/bookingform', 'FormController@store1');

  });

//////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/history', 'AdminController@history');

Auth::routes();
Route::get('/sudosu', function(){
    return view('auth.login');
});
Route::get('/adminPanel', 'AdminPanelController@index');

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

//History
Route::get('/history','HistoryController@index');
Route::post('/historyDetail','HistoryController@detail');
Route::get('/exportLog/{value}','HistoryController@export');
Route::get('/exportLogDocs/{value}','HistoryController@exportPdf');

//Manage Reservations
Route::get('/manageReservations','ManageReservationsController@index');
Route::post('/reservationDetail','ManageReservationsController@detail');
Route::post('/reservationApprove','ManageReservationsController@approve');
Route::post('/reservationCancel','ManageReservationsController@cancel');
Route::post('/reservationRevive','ManageReservationsController@revive');

//Notifications
Route::post('/notif','NotificationsController@notif');
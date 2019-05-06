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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('hotels/search', 'HotelsSearchController@index');
Route::get('rooms/{room_id}', 'RoomsController@show');
Route::get('rooms/{room_id}/confirm-booking', 'BookingController@store')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {

    Route::get('profile', 'ProfileController@index');
    Route::post('profile/update', 'ProfileController@update');
    Route::get('profile/my-bookings', 'ProfileController@myBookings');
    Route::get('profile/change-password', 'ProfileController@changePassword');
    Route::post('profile/change-password', 'ProfileController@updatePassword');
    Route::get('payment/{booking_id}/pay', 'PaymentController@create');
    Route::post('payment/{booking_id}/pay', 'PaymentController@store');

    Route::resource('administration/hotels', 'Admin\HotelController');
    Route::resource('administration/rooms', 'Admin\RoomController');
    Route::get('administration/bookings', 'Admin\BookingController@index');
    Route::post('administration/bookings/{booking_id}/cancel', 'Admin\BookingController@cancel');
    Route::post('administration/bookings/{booking_id}/mark-as-paid', 'Admin\BookingController@markAsPaid');
    Route::post('administration/bookings/{booking_id}/refund', 'Admin\BookingController@refund');
});
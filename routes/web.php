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

Route::get('profile', 'ProfileController@index');
Route::post('profile/update', 'ProfileController@update');
Route::get('profile/my-bookings', 'ProfileController@myBookings');
Route::get('profile/change-password', 'ProfileController@changePassword');
Route::post('profile/change-password', 'ProfileController@updatePassword');
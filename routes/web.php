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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('lapangans','LapanganController');
    Route::resource('members','MemberController');
    Route::resource('laporan-mingguan','LaporanMingguanController');
    Route::resource('laporan-bulanan','LaporanBulananController');
    Route::resource('laporan-tahunan','LaporanTahunanController');
    Route::resource('bookings', 'BookingController');

    Route::post('bookings/approve/{id}', 'BookingController@approve')->name('bookings.approve');
    Route::post('bookings/reject/{id}', 'BookingController@reject')->name('bookings.reject');
});

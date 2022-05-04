<?php

use App\Http\Controllers\DomainsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('/login-customer', 'Auth\Customer\LoginController@loginn')->name("login_customer");
// Route::get('/', 'Company\Auth\LoginController@showLoginForm');
Route::get('/login_client', 'Auth\Customer\LoginController@showLoginForm')->name('login_client');
// Route::post('/login', 'Company\Auth\LoginController@login');
Route::get('/logout_customer', 'Auth\Customer\LoginController@logout')->name('logout_customer');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::Post('/reigster_client', 'Auth\Customer\RegisterController@register')->name('reigster_client');
Route::group(['middleware' => ['auth:customer']], function () {
});
Route::get('/thongtin', 'InformationController@information')->name('thongtin'); //thông tin cá nhân

Route::resource('/', 'ClientController');
Route::get('/gioithieu', 'ClientController@introduce');
Route::get('/lienhe', 'ClientController@contact')->name('lienhe');
Route::get('/tuyenxephobien/{id}', 'ClientBookingController@tuyenxephobien')->name('tuyenxephobien');
// Route::resource('tintuc', 'ClientNewsController');
Route::get('/datve', 'ClientBookingController@datve')->name('datve');
Route::post('/chonchuyen', 'ClientBookingController@chonchuyen')->name('chonchuyen');
Route::get('/chonve/{id}', 'ClientBookingController@chonve')->name('chonve');
Route::post('/thanhtoan', 'ClientBookingController@thanhtoan')->name('thanhtoan');
Route::post('/thanhtoan2', 'ClientBookingController@thanhtoan2')->name('thanhtoan2');
Route::post('/thanhtoan3', 'ClientBookingController@thanhtoan3')->name('thanhtoan3');
Route::get('return-vnpay', 'ClientBookingController@return_vnpay');
Route::resource('tintuc', 'ClientNewsController');
Auth::routes([
  'register' => true, // Registration Routes...
  'reset' => true, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...

]);
Route::group(["middleware" => ["auth"], "prefix" => "two_face"], function () {
  Route::get("/", "VerifyTwoFaceController@index")->name("two_face.index");
  Route::post("/verify", "VerifyTwoFaceController@verify")->name("two_face.verify");
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', '2fa']], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/', 'HomeController@index');
  Route::group(["prefix" => "two_face_auths"], function () {
    Route::get("/", "TwoFaceAuthsController@index")->name("2fa_setting");
    Route::post("/enable", "TwoFaceAuthsController@enable")->name("enable_2fa_setting");
    Route::get("/disable", "TwoFaceAuthsController@disable")->name("disable_2fa_setting");
  });
  Route::resource('coach', 'CoachController');
  Route::resource('type_bus', 'TypeBusesController');
  Route::resource('users', 'UsersController');
  Route::resource('busstop', 'BusStopController');
  Route::resource('buse', 'BuseController');
  Route::resource('news', 'NewsController');
  Route::resource('province', 'ProvinceController');
  Route::resource('route_bus', 'RouteBusController');
  Route::resource('setting', 'SettingController');
  Route::get('change_password', 'ChangePasswordController@changePassword')->name('change_password');
  Route::post('update_password', 'ChangePasswordController@updatePassword')->name('update_password');
});

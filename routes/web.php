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
Route::Post('/reigster_client', 'Auth\Customer\RegisterControler@register')->name('reigster_client');
Route::group(['middleware' => ['auth:customer']], function () {
});


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
// Route::get('post_cat/{id}', 'ClientPostCategoryController@show');
// Route::get('post/{slug}', 'ClientPostController@show');
// Route::view('feature', 'client.feature.index');
// Route::view('/loadPage', 'client.loadPage');

// Route::get('/', 'ClientUserController@ckeck_register');
// Route::get('template', 'ClientThemesController@index');
// Route::get('template/{id}', 'ClientThemesController@show');
// Route::get('preview/{id}', 'ClientPreviewController@index');
// Route::view('prices', 'client.prices.index');
// Route::get('create_website', 'ClientRouteController@create_website')->name('create_website');
// Route::view('create_website_confirm', 'client.account.websites.confirm');
// Route::get('create_website_confirm', 'ClientUserController@ckeck_login');
// Route::post('store_website', 'ClientRouteController@store_website')->name('store_website');

// Route::view('/forgot_password', 'auth.passwords.email');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Route::get('reset-password/{token},{email}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



// Route::prefix('account')->group(function () {

//   Route::view('update_profile', 'client.account.update_profile');
//   Route::post('change_profile', 'ClientUserController@changeProfile')->name('change_profile');
//   Route::view('update_password', 'client.account.change_pass');
//   Route::post('change_password', 'ClientUserController@change_password');
//   Route::get('logout', 'ClientUserController@logout_account');
//   Route::prefix('website')->group(function () {
//     Route::get('/', 'ClientRouteController@index')->name('website');
//     Route::get('/{id}', 'ClientRouteController@website_detail_page')->name('detail_website');
//     // Route::view('edit/{id}', 'client.account.websites.edit');
//     Route::post('/{id}', 'ClientRouteController@update_website')->name('update_website');
//     Route::get('edit/{id}', 'ClientRouteController@edit_website')->name('edit_website');
//     Route::get('delete/{id}', 'ClientRouteController@delete_website')->name('delete_website');
//     Route::post('delete/{id}', 'ClientRouteController@destroy_website')->name('delete_website');
//     Route::get('change_domain/{id}', 'ClientRouteController@change_domain')->name('change_domain');
//     Route::post('change_domain/{id}', 'ClientRouteController@confirm_change_domain')->name('change_domain');
//   });
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['checkRole', 'auth', '2fa']], function () {

//   Route::get('jobs', 'JobsController@index');
//   Route::get('failed_jobs', 'FailedJobsController@index');
//   Route::get('/home', 'HomeController@index')->name('home');
//   Route::get('/', 'HomeController@index');
//   Route::group(["prefix" => "two_face_auths"], function () {
//     Route::get("/", "TwoFaceAuthsController@index")->name("2fa_setting");
//     Route::post("/enable", "TwoFaceAuthsController@enable")->name("enable_2fa_setting");
//     Route::get("/disable", "TwoFaceAuthsController@disable")->name("disable_2fa_setting");
//   });
//   Route::post('/upload', 'PostController@upload')->name('ckeditor.upload');
//   Route::resource('setings', 'SetingsController');
//   Route::resource('post', 'PostController');
//   Route::resource('post_category', 'PostCategoryController');
//   Route::resource('menus', 'MenuController');
//   Route::resource('group_menus', 'GroupMenuController');;

//   Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

//   Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

//   Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

//   Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

//   Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

//   Route::post(
//     'generator_builder/generate-from-file',
//     '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
//   )->name('io_generator_builder_generate_from_file');
//   Route::resource('domains', 'DomainsController');
//   Route::resource('users', 'UsersController');
//   Route::resource('packages', 'PackageController');
//   Route::resource('packageOrders', 'PackageOrderController');
//   Route::get('packageOrders/update_status/{id}/{status_id}', 'PackageOrderController@update_status')->name('update_status');

//   Route::resource('roles', 'RolesController');

//   Route::resource('themes', 'ThemesController');

//   Route::resource('theme_color', 'ThemeColorController');

//   Route::resource('theme_tag', 'ThemeTagController');

//   Route::get('change_password', 'ChangePasswordController@changePassword')->name('change_password');

//   Route::post('update_password', 'ChangePasswordController@updatePassword')->name('update_password');

//   Route::resource('report_mains', 'ReportMainController');
//   Route::get('getDataReport', 'ReportMainController@report_column');
//   Route::get('overview', 'OverviewController@index');

//   Route::get('export', 'DomainsController@export')->name('export');

//   Route::get('notification', 'NotificationController@index');
//   Route::post('notification_store', 'NotificationController@store')->name('store');

//   Route::get('error_statistics', 'ErrorStatisticsController@index')->name('error_statistics');
//   Route::get('error_statistics/show/{id}', 'ErrorStatisticsController@show')->name('show');

//   Route::get('domain_renew/{id}', 'DomainsController@domain_renew_form');
//   Route::post('domain_renew_submit/{id}', 'DomainsController@domain_renew');

//   Route::get('update/{id}', 'DomainsController@update_form');
//   Route::post('update_form_submit/{id}', 'DomainsController@update');

//   Route::get('update_plugin/{id}', 'DomainsController@update_plugin');

//   Route::get('update_all_plugin', 'DomainsController@update_all_plugin')->name('update_all_plugin');
// });

// Route::view('not_found', 'client.errors.not_found');
// Route::get('/{path?}', function ($path = null) {
//   return View::make('client.errors.not_found');
// })->where('path', '.*')->middleware('auth');

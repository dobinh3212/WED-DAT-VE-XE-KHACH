<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('domains', 'DomainsAPIController');
Route::resource('packages', 'PackageAPIController');
Route::resource('package_orders', 'PackageOrderAPIController');
Route::post('update_package_orders_status', 'PackageOrderAPIController@update_status');
Route::resource('users', 'UsersAPIController');
Route::resource('roles', 'RolesAPIController');
Route::post('decode', 'PackageOrderAPIController@decode');
Route::get('getPackageByTenantId/{tenant_id}', 'DomainsAPIController@getPackageByTenantId');
Route::get('getSystemRecord/{tenant_id}', 'UsersAPIController@getSystemRecord');
Route::get('findByCode/{code}', 'PackageOrderAPIController@findByCode');
Route::post('MoMoIPN', 'PackageOrderAPIController@MoMoIPN');
Route::post('ZLPIPN', 'PackageOrderAPIController@ZLPIPN');
Route::get('update_exp_and_scale/{tenant_id}', 'DomainsAPIController@update_exp_and_scale');
Route::get('VnPayIPN', 'PackageOrderAPIController@VnPayIPN');

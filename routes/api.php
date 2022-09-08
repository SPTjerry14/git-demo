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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'device',
    'namespace' => 'Device',
    'middleware' => 'auth:sanctum'
], function () {
    Route::get('list', 'ListController@main');
    Route::delete('{id}', 'DestroyController@main');
    Route::post('{id}/rent', 'RentController@main');
    Route::put('{id}/giveback', 'GivebackController@main');
    Route::post('add', 'AddController@main');
    Route::put('{id}', 'UpdateController@main');
    Route::get('{id}', 'ShowController@main');
});

Route::group([
    'prefix' => 'user',
    'namespace' => 'Auth',
    'middleware' => 'auth:sanctum'
], function () {
    Route::post('logout', 'LogoutController@main');
    Route::put('{id}', 'UpdateController@main');
    Route::delete('{id}', 'DestroyController@main');
    Route::get('list', 'ListController@main');
    Route::get('{id}', 'ShowController@main');
});
Route::group([
    'namespace' => 'Auth',
], function () {
    Route::post('login', 'LoginController@main');
    Route::post('register', 'RegisterController@main');
});

Route::group([
    'prefix' => 'profile',
    'namespace' => 'Profile',
    'middleware' => 'auth:sanctum'
], function () {
    Route::put('{id}', 'UpdateController@main');
    Route::get('{id}', 'ShowController@main');
});

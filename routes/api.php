<?php

use App\Http\Controllers\Api\Auth\DestroyController;
use App\Http\Controllers\Api\Auth\DeviceController;
use App\Http\Controllers\Api\Auth\ListController;
use App\Http\Controllers\Api\Auth\PostController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\UpdateController;
use App\Http\Controllers\Api\Auth\UserController as AuthUserController;
use App\Http\Controllers\Api\Profile\ShowController;
use App\Http\Controllers\Api\Profile\UpdateController as ProfileUpdateController;
use App\Http\Controllers\Api\User\UpdateController as UserUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Models\Device;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::post('/register', [RegisterController::class, 'main']);

Route::get('/user/{id}', 'User\ShowController@main');

Route::get('/list/users', [ListController::class, 'listUser']);
Route::get('/list/profiles', [ListController::class, 'listProfile']);
Route::get('/list/roles', [ListController::class, 'listRole']);

Route::put('/profile/{id}', [ProfileUpdateController::class, 'main']);
Route::put('/user/{id}', [UserUpdateController::class, 'main']);

Route::put('/user/{id}', [UpdateController::class, 'main']);

Route::delete('/user/{id}', [DestroyController::class, 'main']);

Route::get('/profile/{id}', [ShowController::class, 'main']);

Route::post('/login', 'Auth\LoginController@main');

Route::get('/logout', 'Auth\LogoutController@main')->middleware('auth:sanctum');

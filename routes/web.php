<?php

use App\Http\Controllers\Api\Auth\DeviceController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\UserController as AuthUserController;
use App\Http\Controllers\DeviceController as ControllersDeviceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::any('/', function () {
    return view('welcome');
});

Route::any('', function () {
    return "hello";
})->name('register');

// Route::any('/login', function () {
//     return view('users/login');
// });

// Đăng ký thành viên
Route::get('/register', [RegisterController::class, 'getRegister']);
Route::post('/register', [RegisterController::class, 'main']);

// Login
Route::get('/login', [LoginController::class, 'getlogin']);
Route::post('/login', [LoginController::class, 'main']);

// Logout
Route::get('/logout', [LogoutController::class, 'main']);

//index test
Route::get('/index1', [AuthUserController::class, 'roleUser']);

Route::get('/userdevice', [AuthUserController::class, 'userdevice']);

Route::get('/index', [UserController::class, 'roleUser']);

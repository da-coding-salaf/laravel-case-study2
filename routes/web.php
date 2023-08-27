<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserSession;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/log-out',[UserController::class, 'log_out'])->name('log-out');


Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('user_session');
Route::get('/user-profile', [UserController::class, 'user_profile'])->name('user-profile')->middleware('user_session');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login-file', [UserController::class, 'login'] )->name('login-file');
Route::post('/register-user', [UserController::class, 'register'] )->name('register-user');



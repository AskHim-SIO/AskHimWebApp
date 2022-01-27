<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ServiceController;
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


Route::get('/', [Controller::class, 'Welcome'])->name("home")->middleware('guid');

// AUTHENTICATION
Route::get('/login', [AuthController::class, 'ViewLogin'] )->name('login')->middleware('isAuth');
Route::post('/login/connect', [AuthController::class, 'Login'] )->name('login.connect')->middleware('isAuth');
Route::post('/login/register', [AuthController::class, 'Register'] )->name('register.connect')->middleware('isAuth');
Route::get('/register', [AuthController::class, 'ViewRegister'] )->name('register')->middleware('isAuth');

// -- Deconexion --
Route::get('/disconnect', [AuthController::class, 'Disconnect'] )->name('sign.out');

// -- Service --
Route::get('/service', [ServiceController::class, 'ServiceView'] )->name('view.service')->middleware('ifConnect');

<?php

use App\Http\Controllers\AuthController;
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


Route::get('/', [\App\Http\Controllers\Controller::class, 'TestGet'])->name("home");

// AUTHENTICATION
Route::get('/login', [AuthController::class, 'ViewLogin'] )->name('login');
Route::post('/login/connect', [AuthController::class, 'Login'] )->name('login.connect');
Route::post('/login/register', [AuthController::class, 'Register'] )->name('register.connect');
Route::get('/register', [AuthController::class, 'ViewRegister'] )->name('register');

// DECONNEXION
Route::get('/ABientot', [AuthController::class, 'Disconnect'] )->name('sign.out');



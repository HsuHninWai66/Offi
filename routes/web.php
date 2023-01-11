<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;
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

Route::get('index', [Auth\AuthController::class, 'index'])->name('index');
Route::get('/', [Auth\AuthController::class, 'index'])->name('/');

// Login Pages
Route::get('login', [Auth\AuthController::class, 'login']);
Route::any('login-user', [Auth\AuthController::class, 'loginUser'])->name('login-user');
Route::get('logout', [Auth\AuthController::class, 'logout']);
Route::get('dashboard', [Auth\AuthController::class, 'dashboard'])->name('dashboard');


// Register Pages
Route::get('register', [Auth\AuthController::class, 'showRegister'])->name('register');
Route::post('register', [Auth\AuthController::class, 'register'])->name('register');
Route::post('register/confirm', [Auth\AuthController::class, 'registerConfirm'])->name('registerConfirm');



<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HomeController;
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

Route::get('/clients', [ClientsController::class, 'index'])->name('clients');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/identify', [UserController::class, 'verifyLogin'])->name('verificar');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [UserController::class, 'salir'])->name('logout');
<?php

use App\Http\Controllers\CoursesController;
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

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/laravel', [CoursesController::class, 'laravel'])->name('laravel');
Route::get('/java', [CoursesController::class, 'java'])->name('java');
Route::get('/django', [CoursesController::class, 'django'])->name('django');
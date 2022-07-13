<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/clients', [ClientController::class, 'index'])->name('clients');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/identify', [UserController::class, 'verifyLogin'])->name('verificar');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [UserController::class, 'salir'])->name('logout');
Route::get('cancel', function () {
    return redirect()->route('category.index')->with('alert', ['type' => 'danger', 'message' => 'Cancelled action']);
})->name('cancel');
Route::get('category/{id}/confirm', [CategoryController::class, 'confirmDelete'])->name('category.confirm');
Route::get('unit/{id}/confirm', [UnitController::class, 'confirmDelete'])->name('unit.confirm');

Route::resource('category', CategoryController::class);
Route::resource('unit', UnitController::class);

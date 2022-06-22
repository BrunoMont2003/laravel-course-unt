<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'showLogin']);
Route::post('/bmontañez1', [UserController::class, 'verifyLogin'])->name('verificar');
Route::get('/bmontañez2', [HomeController::class, 'index'])->name('home');
Route::post('/bmontañez3', [UserController::class, 'logout'])->name('userlogout');
Route::get('/bmontañez4', [LibroController::class, 'index'])->name('libro.index');
Route::get('/bmontañez5', [CatalogoController::class, 'index'])->name('catalogo.index');
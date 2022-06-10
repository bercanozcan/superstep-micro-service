<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginPost'])->name('login');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'logoutPost'])->name('logout');

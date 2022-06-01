<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\AuthController;


Route::get('raffles', [RaffleController::class, 'index'])->middleware('auth:api');
Route::post('raffles', [RaffleController::class, 'store']);

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

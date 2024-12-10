<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register-store');


// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


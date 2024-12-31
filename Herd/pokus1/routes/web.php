<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\DashboardController;

// Route to display the main page for authenticated users
Route::get('/', [DashboardController::class, 'index'])->name('home');

// Login routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Registration routes
Route::get('/register', [AuthController::class, 'store'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// User route
Route::get('/user', [UserController::class, 'index']);

Route::get('/person/create', [PersonController::class, 'create'])->name('person.create');
Route::post('/person', [PersonController::class, 'store'])->name('person.store');

Route::get('/gift/create', [GiftController::class, 'create'])->name('gift.create');
Route::post('/gift', [GiftController::class, 'store'])->name('gift.store');
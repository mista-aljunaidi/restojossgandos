<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountAuthController;

// Login
Route::get('/login', [AccountAuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AccountAuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AccountAuthController::class, 'logout'])->name('logout');

// Dashboard (proteksi dengan session)
Route::get('/dashboard', function () {
    if (!session()->has('account_id')) {
        return redirect()->route('login.form');
    }
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('menu', function () {
    return view('menu');
});

Route::get('gallery', function () {
    return view('gallery');
});

Route::get('location', function () {
    return view('location');
});

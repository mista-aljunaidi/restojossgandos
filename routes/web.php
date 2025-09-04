<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountAuthController;
use App\Http\Controllers\GalleryController;

// FRONTEND (publik)
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery.front');

// ADMIN (dashboard)
Route::prefix('dashboard')->middleware([])->group(function () {
    // halaman utama dashboard = kelola foto
    Route::get('/', [GalleryController::class, 'index'])->name('dashboard');

    // aksi CRUD
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

// Login
Route::get('/login', [AccountAuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AccountAuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AccountAuthController::class, 'logout'])->name('logout');

// HOME
Route::get('/', function () {
    return view('home');
});
Route::get('/about', fn() => view('about'));
Route::get('/menu', fn() => view('menu'));
Route::get('/location', fn() => view('location'));

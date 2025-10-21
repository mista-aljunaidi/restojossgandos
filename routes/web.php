<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountAuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;

// FRONTEND (publik)
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery.front');
Route::get('/menu', [MenuController::class, 'publicIndex'])->name('menu.front');

// ADMIN (dashboard)
Route::get('/statistik', function () {
    return view('statistik');
})->name('statistik');
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', function () {
        // cek apakah session login masih ada
        if (!session()->has('account_id')) {
            return redirect()->route('login.form')
                             ->with('error', 'Session anda telah habis, silakan login ulang.');
        }

        $photos = \App\Models\Gallery::latest()->get();
        $menus  = \App\Models\Menu::latest()->get();

        // tambahkan no-cache agar browser tidak simpan halaman lama
        return response()
            ->view('dashboard', compact('photos', 'menus'))
            ->header('Cache-Control','no-cache, no-store, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','0');
    })->name('dashboard');

    // GALLERY CRUD
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // MENU CRUD
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

// Login
Route::get('/login', [AccountAuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AccountAuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AccountAuthController::class, 'logout'])->name('logout');

// HOME
Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/location', 'location');

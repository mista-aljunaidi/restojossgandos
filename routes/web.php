<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountAuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;

// FRONTEND (publik)
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery.front');
Route::get('/menu', [MenuController::class, 'publicIndex'])->name('menu.front');

// ADMIN (dashboard)
Route::prefix('dashboard')->group(function () {
    // Dashboard utama -> tampilkan semua (gallery + menu)
    Route::get('/', function () {
        $photos = \App\Models\Gallery::latest()->get();
        $menus  = \App\Models\Menu::latest()->get();
        return view('dashboard', compact('photos', 'menus'));
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
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login')->with('success', 'Berhasil logout');
})->name('logout');

// HOME
Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/location', 'location');

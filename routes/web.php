<?php

use Illuminate\Support\Facades\Route;
// Import yang ada
use App\Http\Controllers\AccountAuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistikController;

// Import yang DIBUTUHKAN untuk Logika Pencatatan Kunjungan
use Illuminate\Http\Request;
use App\Models\Visit;
use Illuminate\Support\Facades\Session;


// --- FRONTEND (Publik) ---
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery.front');
Route::get('/menu', [MenuController::class, 'publicIndex'])->name('menu.front');

// --- ADMIN AREA (Dilindungi Session) ---
Route::prefix('dashboard')->group(function () {
    
    // 1. Dashboard & Statistik
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');

    // 2. GALLERY CRUD
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // 3. MENU CRUD
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

// --- AUTENTIKASI ---
// Login
Route::get('/login', [AccountAuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AccountAuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AccountAuthController::class, 'logout'])->name('logout');

// --- PAGE PUBLIK ---

// Rute Home (/) - DIBERIKAN LOGIKA PENCATATAN KUNJUNGAN SEMENTARA
Route::get('/', function (Request $request) {
    // Logika Pencatatan Kunjungan Manual
    Visit::create([
        'session_id' => Session::getId(),
        'ip_address' => $request->ip(),
        'url' => $request->url(),
    ]);
    return view('home'); 
});

Route::view('/about', 'about');
Route::view('/reservation', 'reservation');

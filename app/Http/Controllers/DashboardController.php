<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Cek Sesi (Logika dari Route Anonim)
        if (!session()->has('account_id')) {
            return redirect()->route('login.form')
                             ->with('error', 'Session anda telah habis, silakan login ulang.');
        }

        // 2. Hitung Data untuk Statistik (Bagian yang ditambahkan/diperbaiki)
        $galleryCount = Gallery::count();
        $menuCount = Menu::count();
        
        // Ambil nilai default/statis jika tidak ada model Testimonial/Event
        $testimonialCount = 7; // Ganti dengan Testimonial::count() jika model ada
        $eventCount = 0;        // Ganti dengan Event::where('is_active', true)->count() jika model ada

        // 3. Ambil Data untuk Tabel
        $photos = Gallery::latest()->get(); // Mengambil data foto untuk tabel galeri
        $menus  = Menu::latest()->get();    // Mengambil data menu untuk tabel menu

        // 4. Mengirimkan data ke view ('dashboard.blade.php')
        return response()
            ->view('dashboard', compact(
                'photos', 
                'menus', 
                'galleryCount', 
                'menuCount',
                'testimonialCount',
                'eventCount'
            ))
            ->header('Cache-Control','no-cache, no-store, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','0');
    }
}
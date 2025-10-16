<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $menuCount = Menu::count();
        $galleryCount = Gallery::count();

        // Ambil data terbaru untuk tabel
        $menus = Menu::latest()->get();
        $photos = Gallery::latest()->get();

        // Kirim semua data ke view
        return view('dashboard', compact(
            'menuCount',
            'galleryCount',
            'menus',
            'photos'
        ));
    }
}

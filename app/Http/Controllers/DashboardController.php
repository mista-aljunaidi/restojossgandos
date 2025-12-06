<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Menu;
use App\Models\HeaderSetting; // [BARU] Import Model Header
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // [BARU] Import Storage untuk hapus file

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Cek Sesi (Logika dari Route Anonim)
        if (!session()->has('account_id')) {
            return redirect()->route('login.form')
                             ->with('error', 'Session anda telah habis, silakan login ulang.');
        }

        // 2. Hitung Data untuk Statistik
        $galleryCount = Gallery::count();
        $menuCount = Menu::count();
        
        // Ambil nilai default/statis jika tidak ada model Testimonial/Event
        $testimonialCount = 7; 
        $eventCount = 0;      

        // 3. Ambil Data untuk Tabel
        $photos = Gallery::latest()->get(); 
        $menus  = Menu::latest()->get();    

        // [BARU] 4. Ambil Data Pengaturan Header Video
        // firstOrNew() artinya: Ambil data pertama, kalau kosong buat objek baru (biar tidak error)
        $header = HeaderSetting::firstOrNew();

        // 5. Mengirimkan data ke view ('dashboard.blade.php')
        return response()
            ->view('dashboard', compact(
                'photos', 
                'menus', 
                'header', // [BARU] Jangan lupa kirim variabel ini ke view
                'galleryCount', 
                'menuCount',
                'testimonialCount',
                'eventCount'
            ))
            ->header('Cache-Control','no-cache, no-store, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','0');
    }

    /**
     * [BARU] Method untuk Update Video Header (Youtube / File)
     */
    public function updateHeader(Request $request)
    {
        // Ambil setting yang ada atau buat instance baru
        $header = HeaderSetting::firstOrNew();

        // Validasi Input
        $request->validate([
            'source_type' => 'required|in:youtube,file',
            'youtube_url' => 'nullable|required_if:source_type,youtube',
            'video_file'  => 'nullable|required_if:source_type,file|mimetypes:video/mp4,video/quicktime|max:20480', // Max 20MB
        ]);

        // Set Tipe Video
        $header->video_type = $request->source_type;

        // LOGIKA 1: Jika Pilihan YouTube
        if ($request->source_type == 'youtube') {
            // Regex canggih untuk ambil ID dari berbagai format link Youtube
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->youtube_url, $match);
            
            if (isset($match[1])) {
                $header->youtube_id = $match[1];
            }
        }

        // LOGIKA 2: Jika Pilihan Upload File
        if ($request->source_type == 'file' && $request->hasFile('video_file')) {
            // Hapus video lama jika ada filenya di storage
            if ($header->video_path && Storage::disk('public')->exists($header->video_path)) {
                Storage::disk('public')->delete($header->video_path);
            }
            
            // Upload file baru ke folder 'headers' di storage public
            $path = $request->file('video_file')->store('headers', 'public');
            $header->video_path = $path;
        }

        $header->save();

        return redirect()->back()->with('success', 'Video Header berhasil diperbarui!');
    }
}
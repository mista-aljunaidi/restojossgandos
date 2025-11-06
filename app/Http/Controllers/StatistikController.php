<?php

namespace App\Http\Controllers;

use App\Models\Visit; // Model yang baru Anda buat
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- PENTING: Tambahkan ini

class StatistikController extends Controller
{
    public function index()
    {
        // 1. Cek Sesi (Logika yang dipindahkan dari Route)
        if (!session()->has('account_id')) {
            return redirect()->route('login.form')
                             ->with('error', 'Session anda telah habis, silakan login ulang.');
        }

        // --- 2. Perhitungan Statistik Riil ---
        
        // Total Pengunjung: Hitung sesi unik (Bukan 1 tahun terakhir, tapi semua)
        $totalVisitors = Visit::distinct('session_id')->count();

        // Tingkat Kunjungan Ulang: Hitung sesi yang memiliki > 1 hari kunjungan
        $returningVisitors = DB::table('visits')
                            ->select('session_id')
                            ->groupBy('session_id')
                            // Hitung jumlah hari unik per sesi
                            ->having(DB::raw('COUNT(DISTINCT DATE(created_at))'), '>', 1) 
                            ->get() // Ambil koleksi hasil
                            ->count(); // Hitung jumlah baris dari koleksi
        
        // Kalkulasi persentase
        $repeatRate = ($totalVisitors > 0) ? round(($returningVisitors / $totalVisitors) * 100) : 0;

        // Durasi Rata-rata: (Placeholder)
        // Data 'visits' kita saat ini tidak bisa menghitung ini.
        $avgDuration = 'N/A'; // Kita set N/A agar jelas ini belum bisa dihitung

        // Data Grafik Bulanan
        $monthlyLabels = [];
        $monthlyData = [];

        for ($i = 9; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthlyLabels[] = $month->shortMonthName;
            
            // Hitung pengunjung unik bulan ini
            $visitorsThisMonth = Visit::whereMonth('created_at', $month->month)
                                        ->whereYear('created_at', $month->year)
                                        ->distinct('session_id')
                                        ->count();
            $monthlyData[] = $visitorsThisMonth;
        }

        // 3. Mengirimkan data ke view 'statistik.blade.php'
        $data = [
            'totalVisitors' => number_format($totalVisitors, 0, ',', '.'),
            'avgDuration' => $avgDuration, // Akan menampilkan 'N/A'
            'repeatRate' => $repeatRate, // Akan menampilkan angka riil (misal 15%)
            'monthlyLabels' => $monthlyLabels,
            'monthlyData' => $monthlyData,
        ];
        
        // Menggunakan response() untuk menambahkan header cache (sesuai route lama Anda)
        return response()
            ->view('statistik', $data)
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
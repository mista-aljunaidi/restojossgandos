<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        // 1. Cek Sesi
        if (!session()->has('account_id')) {
            return redirect()->route('login.form')
                ->with('error', 'Session anda telah habis, silakan login ulang.');
        }

        // --- 2. Perhitungan Statistik Riil ---
        
        // A. Total Pengunjung (Unik per Session ID)
        $totalVisitors = Visit::distinct('session_id')->count();

        // B. Kunjungan Ulang (Retensi)
        // Menghitung user yang kembali di hari yang berbeda
        $returningVisitors = DB::table('visits')
            ->select('session_id')
            ->groupBy('session_id')
            ->having(DB::raw('COUNT(DISTINCT DATE(created_at))'), '>', 1) 
            ->get()
            ->count();
        
        $repeatRate = ($totalVisitors > 0) ? round(($returningVisitors / $totalVisitors) * 100) : 0;

        // C. Durasi Rata-rata (FIXED: Support SQLite & MySQL)
        // Menggunakan PHP Collection (Carbon) untuk menghitung selisih waktu.
        // Ini menggantikan TIMESTAMPDIFF yang error di SQLite.
        $visitsWithDuration = Visit::whereNotNull('last_activity')->get();
        
        $avgSeconds = $visitsWithDuration->avg(function ($visit) {
            $start = Carbon::parse($visit->created_at);
            $end = Carbon::parse($visit->last_activity);
            return $end->diffInSeconds($start);
        });

        // Konversi detik ke format "Xm Ys"
        $avgDuration = '0m 0s';
        if ($avgSeconds) {
            $minutes = floor($avgSeconds / 60);
            $seconds = round($avgSeconds % 60);
            $avgDuration = "{$minutes}m {$seconds}s";
        }

        // D. Data Grafik Bulanan (Pengunjung Unik per Bulan)
        $monthlyLabels = [];
        $monthlyData = [];

        for ($i = 6; $i >= 0; $i--) { // Mengambil 7 bulan terakhir agar grafik lebih rapi
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->translatedFormat('M'); // Jan, Feb, dst (sesuai locale)
            
            $monthlyLabels[] = $monthName;
            
            $visitorsThisMonth = Visit::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->distinct('session_id')
                ->count();
                
            $monthlyData[] = $visitorsThisMonth;
        }

        // 3. Kirim data ke View
        $data = [
            'totalVisitors' => number_format($totalVisitors, 0, ',', '.'),
            'avgDuration'   => $avgDuration, 
            'repeatRate'    => $repeatRate,
            'monthlyLabels' => $monthlyLabels,
            'monthlyData'   => $monthlyData,
        ];
        
        return response()
            ->view('statistik', $data)
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
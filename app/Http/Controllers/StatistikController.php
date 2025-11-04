<?php

namespace App\Http\Controllers;

use App\Models\Visit; // Model yang baru Anda buat
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        
        // Total Pengunjung: Hitung sesi unik selama 1 tahun terakhir
        $totalVisitors = Visit::where('created_at', '>=', Carbon::now()->subYear())->distinct('session_id')->count();

        // Durasi Rata-rata & Kunjungan Ulang: Karena ini kompleks, gunakan nilai sementara
        $avgDurationSeconds = 222;
        $avgDuration = floor($avgDurationSeconds / 60) . 'm ' . ($avgDurationSeconds % 60) . 's';
        $repeatRate = 27;

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
            'avgDuration' => $avgDuration,
            'repeatRate' => $repeatRate,
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
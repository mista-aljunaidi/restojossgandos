<?php

namespace App\Http\Middleware;

use App\Models\Visit; // Import Model Visit Anda
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Import Session
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = Session::getId();
        
        // 1. Cek apakah sesi ini sudah dicatat sebagai kunjungan hari ini
        $isVisitRecorded = Visit::where('session_id', $sessionId)
                                ->whereDate('created_at', today())
                                ->exists();

        // 2. Jika belum dicatat, buat entri baru
        if (!$isVisitRecorded) {
            Visit::create([
                'session_id' => $sessionId,
                // Menggunakan request->ip() untuk alamat IP pengunjung
                'ip_address' => $request->ip(),
                // Menggunakan request->fullUrl() untuk mencatat URL lengkap
                'url' => $request->fullUrl(),
            ]);
        }

        return $next($request);
    }
}

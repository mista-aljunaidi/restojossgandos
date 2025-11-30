<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = Session::getId();
        
        // 1. Cari data kunjungan hari ini berdasarkan Session ID
        $visit = Visit::where('session_id', $sessionId)
                      ->whereDate('created_at', today())
                      ->first();

        // 2. Logika Update atau Create
        if ($visit) {
            // Jika sudah ada, update 'last_activity' ke waktu sekarang
            // Ini menandakan user masih aktif di website
            $visit->update([
                'last_activity' => now(),
                'url' => $request->fullUrl() // Opsional: update URL terakhir yang dibuka
            ]);
        } else {
            // Jika belum ada (kunjungan pertama hari ini), buat baru
            Visit::create([
                'session_id' => $sessionId,
                'ip_address' => $request->ip(),
                'url' => $request->fullUrl(),
                'created_at' => now(),
                'last_activity' => now(), // Set awal sama dengan created_at
            ]);
        }

        return $next($request);
    }
}
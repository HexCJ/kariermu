<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLaporanStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$status)
    {
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki laporan dengan status tertentu
        if ($user->laporan()->where('status', $status)->exists()) {
            return $next($request);
        }
        // Jika pengguna tidak memiliki laporan dengan status yang dibutuhkan
        return response()->view('errors.index',[
            'title' => '403'
        ],403);
    }
}

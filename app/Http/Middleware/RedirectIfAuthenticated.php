<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Jika tidak ada guard yang diberikan, gunakan guard 'web' secara default
        $guards = empty($guards) ? ['web'] : $guards;

        foreach ($guards as $guard) {
            // Periksa apakah pengguna sudah terautentikasi pada guard tertentu
            if (Auth::guard($guard)->check()) {
                // Redirect pengguna ke halaman HOME sesuai dengan guard yang digunakan

                    return redirect(RouteServiceProvider::HOME);
                
            }
        }

        // Jika pengguna tidak terautentikasi pada semua guard yang diberikan, lanjutkan ke middleware berikutnya
        return $next($request);
    }
}

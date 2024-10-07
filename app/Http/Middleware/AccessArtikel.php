<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccessArtikel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('mahasiswa')->check() || !Auth::guard('psikolog')->check() ||!Auth::guard('admin')->check()) {
            return redirect()->route('signin')->with('error_message', 'Anda harus login untuk mengakses artikel ini.');
        }

        return $next($request);
    }
}

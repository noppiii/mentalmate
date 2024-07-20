<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $guards = ['mahasiswa', 'psikolog', 'admin'];
        $user = null;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                $request->merge(['user' => $user, 'guard' => $guard]);
                return $next($request); // Proceed to the next middleware or route handler
            }
        }

        return redirect()->route('signin'); // Redirect to sign-in page if no user authenticated
    }
}
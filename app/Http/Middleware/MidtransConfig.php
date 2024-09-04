<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Midtrans\Config;
use Symfony\Component\HttpFoundation\Response;

class MidtransConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        \Log::info('Midtrans Configuration:', [
            'serverKey' => config('services.midtrans.serverKey'),
            'isProduction' => config('services.midtrans.isProduction'),
            'isSanitized' => config('services.midtrans.isSanitized'),
            'is3ds' => config('services.midtrans.is3ds'),
        ]);

        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        return $next($request);
    }
}

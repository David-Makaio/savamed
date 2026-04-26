<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyPharmacy
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->apotek && !$user->apotek->terverifikasi) {
                
                if (!$request->routeIs('waiting-room')) {
                    return redirect()->route('waiting-room');
                }
            }
        }

        return $next($request);
    }
}

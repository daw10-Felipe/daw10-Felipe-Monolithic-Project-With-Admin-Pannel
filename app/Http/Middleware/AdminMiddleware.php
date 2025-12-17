<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Si el usuario está logueado Y su rol es 2 (Admin)
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request);
        }

        // Si no, lo echamos fuera (a la página principal)
        return redirect('/');
    }
}

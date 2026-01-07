<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // jika belum login
        if (!Auth::check()) {
            return redirect()->route('auth'); // atau route loginmu
        }

        // Ambil role user
        $userRole = Auth::user()->role;

        // Jika role ada di daftar yang diizinkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika tidak punya akses
        return abort(403, 'Anda tidak punya akses.');
    }
}

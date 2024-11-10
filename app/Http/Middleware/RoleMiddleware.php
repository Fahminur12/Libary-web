<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('failed', 'Silahkan login terlebih dahulu');
        }

        $user = Auth::user();

        if ($user->user_level !== $role) {
            abort(404, 'Unauthorized');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Ambil user yang login
        $user = auth()->user();

        // Jika belum login, redirect ke login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Kamu harus login dulu.');
        }

        // Support multi-role, contoh: admin|editor
        $roles = explode('|', $role);

        // Jika role user tidak sesuai
        if (!in_array($user->role, $roles)) {
            return redirect()->route('landing')->with('error', 'Akses ditolak. Kamu bukan ' . $role);
        }

        // Jika role sesuai, lanjutkan request
        return $next($request);
    }
}

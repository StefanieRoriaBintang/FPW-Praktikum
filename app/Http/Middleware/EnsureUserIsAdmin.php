<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Contoh pengecekan sederhana (misal cek header atau parameter role)
        if ($request->input('role') !== 'admin') {
            return response()->json(['message' => 'Unauthorized. Admin only.'], 403);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Pastikan user terautentikasi dan memiliki role yang sesuai
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response
    {
        $user = auth()->user();

        if (!$user) {
            abort(403);
        }

        if (!$user->roles()->where('nombre', $role)->exists()) {
            abort(403, 'No tiene permisos.');
        }

        return $next($request);
    }
}
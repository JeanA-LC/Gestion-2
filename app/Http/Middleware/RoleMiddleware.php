<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Acepta uno o varios roles separados por coma.
     * El usuario pasa si tiene AL MENOS UNO de los roles.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = auth()->user();

        if (! $user) {
            abort(403);
        }

        $userRoles = $user->roles->pluck('nombre');

        foreach ($roles as $role) {
            if ($userRoles->contains($role)) {
                return $next($request);
            }
        }

        if ($request->expectsJson()) {
            abort(403, 'No tiene permisos.');
        }

        return redirect()->route('dashboard')
            ->with('error', 'No tienes permiso para acceder a esa sección.');
    }
}

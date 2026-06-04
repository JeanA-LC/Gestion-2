<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // ── Gates de rol ──────────────────────────────────────────────────────
        Gate::define('es-admin', fn($u) =>
            $u->roles->contains('nombre', 'Administrador')
        );

        Gate::define('es-coordinador', fn($u) =>
            $u->roles->contains('nombre', 'Coordinador')
        );

        Gate::define('es-personero', fn($u) =>
            $u->roles->contains('nombre', 'Personero')
        );

        Gate::define('es-simpatizante', fn($u) =>
            $u->roles->contains('nombre', 'Simpatizante')
        );

        // Acceso combinado
        Gate::define('admin-o-coordinador', fn($u) =>
            $u->roles->whereIn('nombre', ['Administrador', 'Coordinador'])->isNotEmpty()
        );

        Gate::define('operativo', fn($u) =>
            $u->roles->whereIn('nombre', ['Administrador', 'Coordinador', 'Personero'])->isNotEmpty()
        );

        // ── Superuser bypass ──────────────────────────────────────────────────
        // El Administrador pasa todos los Gates automáticamente
        Gate::before(fn($u) =>
            $u->roles->contains('nombre', 'Administrador') ? true : null
        );
    }
}

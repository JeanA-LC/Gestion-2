<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TipoActorPoliticoController;
use App\Http\Controllers\ComiteBaseController;
use App\Http\Controllers\InteresadoController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\PostulacionPersoneroController;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\CredencialController;
use App\Http\Controllers\CentroVotacionController;
use App\Http\Controllers\MesaSufragioController;
use App\Http\Controllers\TipoPersoneroController;
use App\Http\Controllers\AsignacionPersoneroController;
use App\Http\Controllers\ReporteEstadoController;
use App\Http\Controllers\ReporteFinalController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\RegistroPublicoController;

// ─────────────────────────────────────────────────────────
// RUTAS PÚBLICAS — Auto-registro por link de coordinador
// ─────────────────────────────────────────────────────────
Route::get('/registro/{token}',        [RegistroPublicoController::class, 'show'])->name('registro.show');
Route::post('/registro/{token}',       [RegistroPublicoController::class, 'store'])->name('registro.store');
Route::get('/registro/{token}/gracias',[RegistroPublicoController::class, 'gracias'])->name('registro.gracias');

Route::get('/', fn() => redirect()->route('dashboard'));

// ─────────────────────────────────────────────────────────
// RUTAS AUTENTICADAS
// ─────────────────────────────────────────────────────────
Route::middleware(['auth'])->group(function () {

    // Dashboard inteligente (redirige según rol)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ── SOLO ADMINISTRADOR ────────────────────────────────
    Route::middleware('role:Administrador')->group(function () {
        Route::resource('usuarios',      UsuarioController::class);
        Route::resource('departamentos', DepartamentoController::class);
        Route::resource('provincias',    ProvinciaController::class);
        Route::resource('distritos',     DistritoController::class);
        Route::resource('zonas',         ZonaController::class);
    });

    // ── ADMINISTRADOR + COORDINADOR ───────────────────────
    Route::middleware('role:Administrador,Coordinador')->group(function () {
        Route::resource('tipo-actor-politico', TipoActorPoliticoController::class);
        Route::resource('personas',            PersonaController::class);
        Route::resource('comites',             ComiteBaseController::class);
        Route::resource('interesados',         InteresadoController::class);
        Route::resource('tipo-evento',         TipoEventoController::class);
        Route::resource('eventos',             EventoController::class);
        Route::resource('participaciones',     ParticipacionController::class);
        Route::resource('postulaciones',       PostulacionPersoneroController::class);
        Route::resource('capacitaciones',      CapacitacionController::class);
        Route::resource('evaluaciones',        EvaluacionController::class);
        Route::resource('credenciales',        CredencialController::class)->only(['index','show','store']);
        Route::resource('centros-votacion',    CentroVotacionController::class);
        Route::resource('mesas-sufragio',      MesaSufragioController::class);
        Route::resource('tipos-personero',     TipoPersoneroController::class);
        Route::resource('asignaciones',        AsignacionPersoneroController::class);

        // Links de invitación (solo el coordinador ve los suyos)
        Route::resource('mis-links', InvitacionController::class)
             ->except(['show']);
    });

    // ── TODOS LOS ROLES OPERATIVOS (Admin, Coordinador, Personero) ──
    Route::middleware('role:Administrador,Coordinador,Personero')->group(function () {
        Route::resource('reportes-estado', ReporteEstadoController::class);
        Route::resource('reportes-final',  ReporteFinalController::class);
    });
});

require __DIR__.'/auth.php';

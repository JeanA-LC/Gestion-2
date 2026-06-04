<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan; // <-- Importante añadir esta fachada

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// ==========================================
// RUTA TEMPORAL PARA EJECUTAR SEEDERS
// ==========================================
Route::get('/ejecutar-seeders', function () {
    try {
        Artisan::call('db:seed');
        return '¡Todos los datos (roles, usuarios y ubigeos) han sido insertados con éxito desde el navegador!';
    } catch (\Exception $e) {
        return 'Error al ejecutar los seeders: ' . $e->getMessage();
    }
});

// ==========================================
// RUTAS CON AUTENTICACIÓN
// ==========================================
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:Administrador')->group(function () {
        Route::resource('usuarios', UsuarioController::class);
    });
});

require __DIR__.'/auth.php';
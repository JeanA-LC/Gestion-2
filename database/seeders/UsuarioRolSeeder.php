<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioRolSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar el primer usuario con correo del administrador (ajustar según el correo real)
        $usuario = DB::table('usuario')
            ->where('correo', 'JEAN@gmail.com')
            ->first();

        $rol = DB::table('rol')
            ->where('nombre', 'Administrador')
            ->first();

        if ($usuario && $rol) {
            DB::table('usuario_rol')->updateOrInsert(
                [
                    'id_usuario' => $usuario->id_usuario,
                    'id_rol' => $rol->id_rol,
                ],
                []
            );
        }
    }
}
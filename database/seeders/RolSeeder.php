<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rol')->insertOrIgnore([
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Acceso total al sistema'
            ],
            [
                'nombre' => 'Coordinador Nacional',
                'descripcion' => 'Gestiona a nivel nacional'
            ],
            [
                'nombre' => 'Coordinador Provincial',
                'descripcion' => 'Gestiona provincias'
            ],
            [
                'nombre' => 'Coordinador Distrital',
                'descripcion' => 'Gestiona distritos'
            ],
            [
                'nombre' => 'Operador',
                'descripcion' => 'Registro y seguimiento'
            ]
        ]);
    }
}
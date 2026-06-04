<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rol')->insertOrIgnore([
            ['nombre' => 'Administrador',  'descripcion' => 'Superusuario — acceso total al sistema'],
            ['nombre' => 'Coordinador',    'descripcion' => 'Gestión operativa de simpatizantes, postulaciones y asignaciones'],
            ['nombre' => 'Personero',      'descripcion' => 'Operativo electoral — reportes y centro de votación'],
            ['nombre' => 'Simpatizante',   'descripcion' => 'Ciudadano captado vía link de invitación'],
        ]);
    }
}
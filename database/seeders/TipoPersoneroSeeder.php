<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPersoneroSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_personero')->insert([
            [
                'nombre' => 'Personero Provincial',
                'nivel_correspondiente' => 'PROVINCIA',
                'descripcion' => 'Representa una provincia'
            ],
            [
                'nombre' => 'Personero Distrital',
                'nivel_correspondiente' => 'DISTRITO',
                'descripcion' => 'Representa un distrito'
            ],
            [
                'nombre' => 'Personero de Zona',
                'nivel_correspondiente' => 'ZONA',
                'descripcion' => 'Representa una zona'
            ],
            [
                'nombre' => 'Personero de Centro de Votacion',
                'nivel_correspondiente' => 'CENTRO_VOTACION',
                'descripcion' => 'Representa un centro de votación'
            ],
            [
                'nombre' => 'Personero de Mesa',
                'nivel_correspondiente' => 'MESA_SUFRAGIO',
                'descripcion' => 'Representa una mesa de sufragio'
            ]
        ]);
    }
}
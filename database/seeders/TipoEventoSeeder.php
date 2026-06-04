<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEventoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_evento')->insert([
            [
                'nombre' => 'Reunion',
                'descripcion' => 'Reuniones políticas'
            ],
            [
                'nombre' => 'Capacitacion',
                'descripcion' => 'Capacitación de personal'
            ],
            [
                'nombre' => 'Mitin',
                'descripcion' => 'Evento masivo'
            ],
            [
                'nombre' => 'Visita Domiciliaria',
                'descripcion' => 'Visita casa por casa'
            ],
            [
                'nombre' => 'Asamblea',
                'descripcion' => 'Asamblea general'
            ]
        ]);
    }
}
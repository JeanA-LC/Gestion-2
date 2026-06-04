<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoActorPoliticoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_actor_politico')->insert([
            [
                'nombre' => 'Militante',
                'descripcion' => 'Miembro activo del partido'
            ],
            [
                'nombre' => 'Simpatizante',
                'descripcion' => 'Apoya al partido'
            ],
            [
                'nombre' => 'Dirigente',
                'descripcion' => 'Líder interno'
            ],
            [
                'nombre' => 'Lider Social',
                'descripcion' => 'Representante social'
            ],
            [
                'nombre' => 'Autoridad',
                'descripcion' => 'Autoridad local o regional'
            ]
        ]);
    }
}
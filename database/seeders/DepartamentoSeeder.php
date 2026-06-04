<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('departamento')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

DB::table('departamento')->insert([
            ['id_departamento' => 1, 'nombre' => 'AMAZONAS'],
            ['id_departamento' => 2, 'nombre' => 'ANCASH'],
            ['id_departamento' => 3, 'nombre' => 'APURIMAC'],
            ['id_departamento' => 4, 'nombre' => 'AREQUIPA'],
            ['id_departamento' => 5, 'nombre' => 'AYACUCHO'],
            ['id_departamento' => 6, 'nombre' => 'CAJAMARCA'],
            ['id_departamento' => 7, 'nombre' => 'CALLAO'],
            ['id_departamento' => 8, 'nombre' => 'CUSCO'],
            ['id_departamento' => 9, 'nombre' => 'HUANCAVELICA'],
            ['id_departamento' => 10, 'nombre' => 'HUANUCO'],
            ['id_departamento' => 11, 'nombre' => 'ICA'],
            ['id_departamento' => 12, 'nombre' => 'JUNIN'],
            ['id_departamento' => 13, 'nombre' => 'LA LIBERTAD'],
            ['id_departamento' => 14, 'nombre' => 'LAMBAYEQUE'],
            ['id_departamento' => 15, 'nombre' => 'LIMA'],
            ['id_departamento' => 16, 'nombre' => 'LORETO'],
            ['id_departamento' => 17, 'nombre' => 'MADRE DE DIOS'],
            ['id_departamento' => 18, 'nombre' => 'MOQUEGUA'],
            ['id_departamento' => 19, 'nombre' => 'PASCO'],
            ['id_departamento' => 20, 'nombre' => 'PIURA'],
            ['id_departamento' => 21, 'nombre' => 'PUNO'],
            ['id_departamento' => 22, 'nombre' => 'SAN MARTIN'],
            ['id_departamento' => 23, 'nombre' => 'TACNA'],
            ['id_departamento' => 24, 'nombre' => 'TUMBES'],
            ['id_departamento' => 25, 'nombre' => 'UCAYALI'],
        ]);
    }
}
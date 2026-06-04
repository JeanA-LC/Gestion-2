<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolSeeder::class,
            TipoActorPoliticoSeeder::class,
            TipoEventoSeeder::class,
            TipoPersoneroSeeder::class,
            UsuarioSeeder::class,
            UsuarioRolSeeder::class,
        ]);
    }
}
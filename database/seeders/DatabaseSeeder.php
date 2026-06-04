<?php

namespace Database\Seeders;

use Database\Seeders\TerritorialSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TerritorialSeeder::class,
            RolSeeder::class,
            TipoActorPoliticoSeeder::class,
            TipoEventoSeeder::class,
            TipoPersoneroSeeder::class,
            UsuarioSeeder::class,
            UsuarioRolSeeder::class,
        ]);
    }
}
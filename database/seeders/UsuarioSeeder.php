<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['correo' => 'jeanandreslc88@gmail.com'],
            [
                'nombres' => 'Jean Andrés',
                'apellidos' => 'López',
                'password' => Hash::make('12345678'),
                'estado' => true,
            ]
        );
    }
}
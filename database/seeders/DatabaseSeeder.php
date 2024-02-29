<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'rol' => 'Admin',
            'dni' => '0000000k',
            'apellidos' => 'admin',
            'edad' => '18',
            'direccion' => 'calle inventada',
            'ciudad' => 'Almería',
            'telefono' => '55555555',
            'puesto' => 'Jefa',
            'name' => 'Estela',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}

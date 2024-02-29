<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert(['nombre' => 'Comida']);
        DB::table('categorias')->insert(['nombre' => 'Cine']);
        DB::table('categorias')->insert(['nombre' => 'Música']);
        DB::table('categorias')->insert(['nombre' => 'Teatro']);
        DB::table('categorias')->insert(['nombre' => 'Magia']);
        DB::table('categorias')->insert(['nombre' => 'Festival']);
        DB::table('categorias')->insert(['nombre' => 'Gaming']);
        DB::table('categorias')->insert(['nombre' => 'Deporte']);
        DB::table('categorias')->insert(['nombre' => 'Juegos']);
    }
}

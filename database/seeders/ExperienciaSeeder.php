<?php

namespace Database\Seeders;

use App\Models\Experiencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experiencia::factory()->count(40)->create();
    }
}

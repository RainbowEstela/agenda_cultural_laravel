<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscription>
 */
class InscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_entradas' => fake()->numberBetween(1, 4),
            'estado' => fake()->randomElement(['recibida', 'confirmada', 'cancelada']),
            'user_id' => fake()->numberBetween(1, 10),
            'evento_id' => fake()->unique()->numberBetween(1, 100),
        ];
    }
}

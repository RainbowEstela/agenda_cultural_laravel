<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experiencia>
 */
class ExperienciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->sentence(3),
            'fecha' => fake()->dateTimeBetween('-2 weeks', '+20 week'),
            'fecha_string' => fake()->randomElement(['4 semanas', '3 días', '1 mes', '5 días', '1 semana', '2 días', '2 semanas']),
            'descripcion_corta' => fake()->sentence(10),
            'descripcion_larga' => fake()->sentence(20),
            'precio' => fake()->randomFloat(2, 9, 99),
            'link' => fake()->url(),
            'imagen' => fake()->randomElement(['exp1.jpg', 'exp2.jpg', 'exp3.jpg', 'exp4.jpg', 'exp5.webp']),
            'categoria_id' => fake()->numberBetween(1, 9),
            'empresa_id' => fake()->numberBetween(1, 20),
        ];
    }
}

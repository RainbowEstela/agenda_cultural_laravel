<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
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
            'hora' => fake()->time('H:i'),
            'descripcion' => fake()->sentence(10),
            'ciudad' => fake()->city(),
            'direccion' => fake()->streetAddress(),
            'estado' => fake()->randomElement(['creado', 'cancelado', 'terminado']),
            'aforo' => fake()->numberBetween(100, 500),
            'tipo' => fake()->randomElement(['presencial', 'online']),
            'entradas_persona' => fake()->numberBetween(4, 10),
            'imagen' => fake()->randomElement(['exp1.jpg', 'exp2.jpg', 'exp3.jpg', 'exp4.jpg', 'exp5.webp']),
            "categoria_id" => fake()->numberBetween(1, 9),
            "user_id" => fake()->numberBetween(1, 10),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'precio' => $this->faker->numberBetween(10000, 40000),
            'peso' => $this->faker->numberBetween(1, 20),
            'stock' => $this->faker->numberBetween(1, 20),
            'categoria_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}

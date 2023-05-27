<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->randomElement([1, 2, 3]),
            'name' => fake()->jobTitle(),
            'description' => fake()->realText(),
            'quantity' => fake()->numberBetween(0, 50),
            'img' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 1, 30)
        ];
    }
}

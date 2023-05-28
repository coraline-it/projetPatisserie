<?php

namespace Database\Factories;

use App\Core\FileHelper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'quantity' => fake()->numberBetween(0, 20),
            'img' => FileHelper::storeFile(fake()->image('public/storage/products/',400,300, null, true), 'public', Str::random(4)) ,
            'price' => fake()->randomFloat(2, 1, 30)
        ];
    }
}

<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 103),
            'payed_at' => fake()->dateTimeBetween(Carbon::now()->subMonths(2), Carbon::now()),
            'status' => 'payed',
            'order_number' => fake()->uuid(),
            'total' => fake()->randomFloat(2, 10, 80),
            'created_at' => fake()->dateTimeBetween(Carbon::now()->subMonths(2), Carbon::now())
        ];
    }
}

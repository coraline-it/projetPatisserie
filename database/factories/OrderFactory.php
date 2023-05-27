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
            'user_id' => fake()->numberBetween(1, 10),
            'payed_at' => fake()->dateTimeBetween(Carbon::now()->subDays(2), Carbon::now()),
            'status' => 'payed',
            'order_number' => fake()->uuid(),
            'total' => fake()->randomFloat(2, 10, 200),
        ];
    }
}

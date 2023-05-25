<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\Category::factory()->create([
            'name' => 'Patisseries',
            'description' => fake()->realText()
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Viennoiseries',
            'description' => fake()->realText()
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Pains',
            'description' => fake()->realText()
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}


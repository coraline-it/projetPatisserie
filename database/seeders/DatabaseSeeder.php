<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // USER CREATE
        // superAdmin user
        User::factory()->create([
        'name' => 'Super Admin',
            'email' => 'superadmin@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'first_name' => 'Joël',
            'address' => fake()->address(),
            'city' => fake()->city(),
            'zip_code' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'role'=> 'superAdmin',
            'created_at' => fake()->dateTime(Carbon::now()->subDays(rand(0, 80))),
            'last_login_at' => fake()->dateTime(Carbon::now()->subDays(rand(0, 70))),
            'last_login_ip' => fake()->ipv4()
        ]);
        // admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'first_name' => 'Jean Valjean',
            'address' => fake()->address(),
            'city' => fake()->city(),
            'zip_code' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'role'=> 'superAdmin',
            'created_at' => fake()->dateTime(Carbon::now()->subDays(rand(0, 80))),
            'last_login_at' => fake()->dateTime(Carbon::now()->subDays(rand(0, 70))),
            'last_login_ip' => fake()->ipv4()
        ]);
        // simple user
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'first_name' => 'Henry',
            'address' => fake()->address(),
            'city' => fake()->city(),
            'zip_code' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'role'=> 'superAdmin',
            'created_at' => fake()->dateTime(Carbon::now()->subDays(rand(0, 80))),
            'last_login_at' => fake()->dateTime(Carbon::now()->subDays(rand(0, 70))),
            'last_login_ip' => fake()->ipv4()
        ]);
        // random users
        User::factory(100)->create();


        // CATEGORIES PRODUCTS
        $categories = ['Patisseries', 'Viennoiseries', 'Pains'];
        for ($i = 0; $i < count($categories); $i++) {
            Category::factory()->create([
                'name' => $categories[$i],
                'description' => fake()->realText()
            ]);
        }


        // PRODUCTS CREATE
        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');
        Product::factory(15)->create();

        // ORDERS CREATE
        Order::factory(4000)->create();

        // ORDER PRODUCTS CREATE
        OrderProduct::factory(10000)->create();
    }
}

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
        // User::factory(50)->create();
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            ReviewSeeder::class,
            MenuSeeder::class,
            DeliverySeeder::class
        ]);
    }
}

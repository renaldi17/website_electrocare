<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // ... existing code ...
        $this->call(UsersTableSeeder::class);
        // // ... existing code ...
        // $this->call(ProductsTableSeeder::class);
        // $this->call(CartsTableSeeder::class);
    }
}

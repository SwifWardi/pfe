<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BannersSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SlidersSeeder;
use Database\Seeders\UserSeeder;
// use Database\Seeders\ProductsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SubcategoriesSeeder::class,
            BannersSeeder::class,
            SlidersSeeder::class,
        ]);        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define categories with their corresponding image paths
        $categories = [
            ['name' => 'Appliances', 'image' => 'uploads/categories/1740388475103826.webp'],
            ['name' => 'Beauty', 'image' => 'uploads/categories/1740388510925410.webp'],
            ['name' => 'Electronics', 'image' => 'uploads/categories/1740388410112488.webp'],
            ['name' => 'Fashion', 'image' => 'uploads/categories/1740388456845535.webp'],
            ['name' => 'Furnitures', 'image' => 'uploads/categories/1740388599418960.webp'],
            ['name' => 'Groceries', 'image' => 'uploads/categories/1740388649576724.webp'],
            ['name' => 'Meat & Fish', 'image' => 'uploads/categories/1740388203907617.png'],
            ['name' => 'Mobiles', 'image' => 'uploads/categories/1740388616630915.webp'],
            ['name' => 'Sweet Home', 'image' => 'uploads/categories/1740388444682193.webp'],
            ['name' => 'Travel', 'image' => 'uploads/categories/1740388803723655.webp'],
            ['name' => 'Hello & Amir', 'image' => 'uploads/categories/1740388410112488.webp'],
            ['name' => 'Moma Si', 'image' => 'uploads/categories/1740388616630915.webp'],
        ];

        foreach ($categories as $category) {
            // Generate a slug based on the category name
            $slug = Str::slug($category['name']);

            // Create the category with name, image, and slug
            Category::create([
                'name' => $category['name'],
                'slug' => $slug, // Store the generated slug
                'image' => $category['image'], // Store the image path
            ]);
        }
    }
}

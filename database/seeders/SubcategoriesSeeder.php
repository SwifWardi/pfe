<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            // Appliances (ID: 1)
            ['name' => 'Washing Machines', 'category_id' => 1, 'slug' => 'washing-machines'],
            ['name' => 'Refrigerators', 'category_id' => 1, 'slug' => 'refrigerators'],
            ['name' => 'Microwaves', 'category_id' => 1, 'slug' => 'microwaves'],

            // Beauty (ID: 2)
            ['name' => 'Skin Care', 'category_id' => 2, 'slug' => 'skin-care'],
            ['name' => 'Hair Care', 'category_id' => 2, 'slug' => 'hair-care'],
            ['name' => 'Makeup', 'category_id' => 2, 'slug' => 'makeup'],

            // Electronics (ID: 3)
            ['name' => 'Laptops', 'category_id' => 3, 'slug' => 'laptops'],
            ['name' => 'Mobile Phones', 'category_id' => 3, 'slug' => 'mobile-phones'],
            ['name' => 'Headphones', 'category_id' => 3, 'slug' => 'headphones'],

            // Fashion (ID: 4)
            ['name' => 'Men\'s Clothing', 'category_id' => 4, 'slug' => 'mens-clothing'],
            ['name' => 'Women\'s Clothing', 'category_id' => 4, 'slug' => 'womens-clothing'],
            ['name' => 'Footwear', 'category_id' => 4, 'slug' => 'footwear'],

            // Furnitures (ID: 5)
            ['name' => 'Living Room Furniture', 'category_id' => 5, 'slug' => 'living-room-furniture'],
            ['name' => 'Bedroom Furniture', 'category_id' => 5, 'slug' => 'bedroom-furniture'],
            ['name' => 'Office Furniture', 'category_id' => 5, 'slug' => 'office-furniture'],

            // Groceries (ID: 6)
            ['name' => 'Fruits & Vegetables', 'category_id' => 6, 'slug' => 'fruits-vegetables'],
            ['name' => 'Snacks', 'category_id' => 6, 'slug' => 'snacks'],
            ['name' => 'Beverages', 'category_id' => 6, 'slug' => 'beverages'],

            // Meat & Fish (ID: 7)
            ['name' => 'Fresh Meat', 'category_id' => 7, 'slug' => 'fresh-meat'],
            ['name' => 'Frozen Meat', 'category_id' => 7, 'slug' => 'frozen-meat'],
            ['name' => 'Fish', 'category_id' => 7, 'slug' => 'fish'],

            // Mobiles (ID: 8)
            ['name' => 'Smartphones', 'category_id' => 8, 'slug' => 'smartphones'],
            ['name' => 'Accessories', 'category_id' => 8, 'slug' => 'accessories'],
            ['name' => 'Tablets', 'category_id' => 8, 'slug' => 'tablets'],

            // Sweet Home (ID: 9)
            ['name' => 'Home Decor', 'category_id' => 9, 'slug' => 'home-decor'],
            ['name' => 'Bedding', 'category_id' => 9, 'slug' => 'bedding'],
            ['name' => 'Kitchenware', 'category_id' => 9, 'slug' => 'kitchenware'],

            // Travel (ID: 10)
            ['name' => 'Luggage', 'category_id' => 10, 'slug' => 'luggage'],
            ['name' => 'Travel Accessories', 'category_id' => 10, 'slug' => 'travel-accessories'],
            ['name' => 'Camping Gear', 'category_id' => 10, 'slug' => 'camping-gear'],
        ];

        // Insert the subcategories into the database
        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}

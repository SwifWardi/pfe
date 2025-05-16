<?php

namespace Database\Seeders;

use App\Models\banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Everyday Fresh & Clean with Our Products',
                'image' => 'uploads/banners/banner-1.png'
            ],
            [
                'title' => 'Make your Breakfast Healthy and Easy',
                'image' => 'uploads/banners/banner-2.png'
            ],
            [
                'title' => 'The best Organic Products Online',
                'image' => 'uploads/banners/banner-3.png'
            ]
        ];

        foreach ($banners as $banner) {
            // Create the banner with title and image
            Banner::create([
                'title' => $banner['title'], // Store the title
                'image' => $banner['image'], // Store the image path
            ]);
        }
    }
}

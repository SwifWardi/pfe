<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // 1. Electronics - Laptops
            [
                'brand_id' => 1,
                'category_id' => 3,
                'subcategory_id' => 7,
                'name' => 'HP Pavilion 15 Laptop',
                'slug' => 'hp-pavilion-15-laptop',
                'code' => 'HP-' . rand(1000, 9999),
                'qty' => 50,
                'tags' => 'laptop,hp,notebook',
                'size' => '15.6 inch',
                'color' => 'Silver',
                'selling_price' => 899.99,
                'discount_price' => 799.99,
                'short_descp' => 'Powerful HP laptop with Intel Core i7 processor',
                'long_descp' => '15.6" FHD display, Intel Core i7-1165G7, 16GB RAM, 512GB SSD, Windows 11',
                'thambnail' => 'uploads/product/thambnail/hp-pavilion-15.webp',
                'vendor_id' => 1,
                'featured' => 1,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/hp-pavilion-1.webp',
                    'uploads/product/multi-img/hp-pavilion-2.webp',
                    'uploads/product/multi-img/hp-pavilion-3.webp'
                ]
            ],

            // 2. Fashion - Men's Clothing
            [
                'brand_id' => 2,
                'category_id' => 4,
                'subcategory_id' => 10,
                'name' => 'Men\'s Oxford Shirt',
                'slug' => 'mens-oxford-shirt',
                'code' => 'SH-' . rand(1000, 9999),
                'qty' => 120,
                'tags' => 'shirt,formal,office',
                'size' => 'S,M,L,XL',
                'color' => 'White',
                'selling_price' => 45.99,
                'discount_price' => 34.99,
                'short_descp' => 'Classic Oxford button-down shirt',
                'long_descp' => '100% cotton, button-down collar, regular fit, machine washable',
                'thambnail' => 'uploads/product/thambnail/mens-oxford-shirt.webp',
                'vendor_id' => 2,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/mens-shirt-1.webp',
                    'uploads/product/multi-img/mens-shirt-2.webp',
                    'uploads/product/multi-img/mens-shirt-3.webp'
                ]
            ],

            // 3. Appliances - Refrigerators
            [
                'brand_id' => 3,
                'category_id' => 1,
                'subcategory_id' => 2,
                'name' => 'LG Smart Inverter Refrigerator',
                'slug' => 'lg-smart-inverter-refrigerator',
                'code' => 'RF-' . rand(1000, 9999),
                'qty' => 18,
                'tags' => 'fridge,lg,energy-saving',
                'size' => '33" W x 69" H',
                'color' => 'Stainless Steel',
                'selling_price' => 1599.00,
                'discount_price' => 1399.00,
                'short_descp' => 'Energy efficient with smart inverter',
                'long_descp' => '23 cu.ft capacity, Door Cooling+, Smart Cooling System, LED lighting',
                'thambnail' => 'uploads/product/thambnail/lg-fridge.webp',
                'vendor_id' => 3,
                'featured' => 1,
                'special_offer' => 0,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/lg-fridge-1.webp',
                    'uploads/product/multi-img/lg-fridge-2.webp',
                    'uploads/product/multi-img/lg-fridge-3.webp'
                ]
            ],

            // 4. Beauty - Skin Care
            [
                'brand_id' => 4,
                'category_id' => 2,
                'subcategory_id' => 4,
                'name' => 'Hyaluronic Acid Serum',
                'slug' => 'hyaluronic-acid-serum',
                'code' => 'SR-' . rand(1000, 9999),
                'qty' => 85,
                'tags' => 'skincare,serum,moisturizing',
                'size' => '1 oz',
                'color' => null,
                'selling_price' => 24.99,
                'discount_price' => 19.99,
                'short_descp' => 'Intense hydration serum',
                'long_descp' => 'With 2% hyaluronic acid, vitamin E, and botanical extracts for plump, hydrated skin',
                'thambnail' => 'uploads/product/thambnail/hyaluronic-serum.webp',
                'vendor_id' => 4,
                'featured' => 1,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/serum-1.webp',
                    'uploads/product/multi-img/serum-2.webp',
                    'uploads/product/multi-img/serum-3.webp'
                ]
            ],

            // 5. Mobiles - Smartphones
            [
                'brand_id' => 5,
                'category_id' => 8,
                'subcategory_id' => 22,
                'name' => 'Samsung Galaxy S23 Ultra',
                'slug' => 'samsung-galaxy-s23-ultra',
                'code' => 'SG-' . rand(1000, 9999),
                'qty' => 35,
                'tags' => 'smartphone,android,samsung',
                'size' => '6.8 inch',
                'color' => 'Phantom Black',
                'selling_price' => 1199.99,
                'discount_price' => 1099.99,
                'short_descp' => 'Flagship Samsung with S Pen',
                'long_descp' => '6.8" Dynamic AMOLED, 200MP camera, 12GB RAM, 512GB storage, S Pen included',
                'thambnail' => 'uploads/product/thambnail/s23-ultra.webp',
                'vendor_id' => 5,
                'featured' => 1,
                'special_offer' => 0,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/s23-1.webp',
                    'uploads/product/multi-img/s23-2.webp',
                    'uploads/product/multi-img/s23-3.webp'
                ]
            ],

            // 6. Groceries - Snacks
            [
                'brand_id' => 6,
                'category_id' => 6,
                'subcategory_id' => 18,
                'name' => 'Organic Almond Butter',
                'slug' => 'organic-almond-butter',
                'code' => 'AB-' . rand(1000, 9999),
                'qty' => 200,
                'tags' => 'snack,healthy,organic',
                'size' => '12 oz',
                'color' => null,
                'selling_price' => 8.99,
                'discount_price' => 6.99,
                'short_descp' => 'Creamy organic almond butter',
                'long_descp' => 'Made with 100% organic almonds, no added sugar or oils, gluten-free',
                'thambnail' => 'uploads/product/thambnail/almond-butter.webp',
                'vendor_id' => 6,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/almond-1.webp',
                    'uploads/product/multi-img/almond-2.webp',
                    'uploads/product/multi-img/almond-3.webp'
                ]
            ],

            // 7. Furniture - Living Room
            [
                'brand_id' => 7,
                'category_id' => 5,
                'subcategory_id' => 13,
                'name' => 'Modern Leather Sofa',
                'slug' => 'modern-leather-sofa',
                'code' => 'SF-' . rand(1000, 9999),
                'qty' => 12,
                'tags' => 'sofa,livingroom,furniture',
                'size' => '84" W x 36" D',
                'color' => 'Brown',
                'selling_price' => 1299.00,
                'discount_price' => 999.00,
                'short_descp' => 'Genuine leather 3-seater sofa',
                'long_descp' => 'Top-grain leather, solid wood frame, high-density foam cushions, includes throw pillows',
                'thambnail' => 'uploads/product/thambnail/leather-sofa.webp',
                'vendor_id' => 7,
                'featured' => 1,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/sofa-1.webp',
                    'uploads/product/multi-img/sofa-2.webp',
                    'uploads/product/multi-img/sofa-3.webp'
                ]
            ],

            // 8. Travel - Luggage
            [
                'brand_id' => 8,
                'category_id' => 10,
                'subcategory_id' => 31,
                'name' => 'Hardside Spinner Luggage',
                'slug' => 'hardside-spinner-luggage',
                'code' => 'LG-' . rand(1000, 9999),
                'qty' => 40,
                'tags' => 'luggage,travel,carryon',
                'size' => '22"',
                'color' => 'Navy Blue',
                'selling_price' => 159.99,
                'discount_price' => 129.99,
                'short_descp' => 'Durable polycarbonate spinner luggage',
                'long_descp' => 'TSA-approved locks, 360° spinner wheels, expandable, water-resistant',
                'thambnail' => 'uploads/product/thambnail/luggage.webp',
                'vendor_id' => 8,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/luggage-1.webp',
                    'uploads/product/multi-img/luggage-2.webp',
                    'uploads/product/multi-img/luggage-3.webp'
                ]
            ],

            // 9. Meat & Fish - Fresh Meat
            [
                'brand_id' => 9,
                'category_id' => 7,
                'subcategory_id' => 20,
                'name' => 'Grass-Fed Ribeye Steak',
                'slug' => 'grass-fed-ribeye-steak',
                'code' => 'ST-' . rand(1000, 9999),
                'qty' => 60,
                'tags' => 'steak,meat,bbq',
                'size' => '12 oz',
                'color' => null,
                'selling_price' => 18.99,
                'discount_price' => 15.99,
                'short_descp' => 'Premium grass-fed beef',
                'long_descp' => 'USDA Choice, dry-aged for tenderness, vacuum-sealed for freshness',
                'thambnail' => 'uploads/product/thambnail/ribeye-steak.webp',
                'vendor_id' => 9,
                'featured' => 1,
                'special_offer' => 0,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/steak-1.webp',
                    'uploads/product/multi-img/steak-2.webp',
                    'uploads/product/multi-img/steak-3.webp'
                ]
            ],

            // 10. Sweet Home - Kitchenware
            [
                'brand_id' => 10,
                'category_id' => 9,
                'subcategory_id' => 28,
                'name' => 'Non-Stick Cookware Set',
                'slug' => 'non-stick-cookware-set',
                'code' => 'CK-' . rand(1000, 9999),
                'qty' => 25,
                'tags' => 'cookware,kitchen,nonstick',
                'size' => '10-piece set',
                'color' => 'Black',
                'selling_price' => 199.99,
                'discount_price' => 149.99,
                'short_descp' => 'Complete non-stick cookware set',
                'long_descp' => 'Includes 8" & 10" fry pans, 1qt & 3qt saucepans, 5qt dutch oven, glass lids, dishwasher safe',
                'thambnail' => 'uploads/product/thambnail/cookware-set.webp',
                'vendor_id' => 10,
                'featured' => 1,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/cookware-1.webp',
                    'uploads/product/multi-img/cookware-2.webp',
                    'uploads/product/multi-img/cookware-3.webp'
                ]
            ],

            // 11. Electronics - Headphones
            [
                'brand_id' => 11,
                'category_id' => 3,
                'subcategory_id' => 9,
                'name' => 'Wireless Noise Cancelling Headphones',
                'slug' => 'wireless-noise-cancelling-headphones',
                'code' => 'HP-' . rand(1000, 9999),
                'qty' => 75,
                'tags' => 'headphones,audio,wireless',
                'size' => 'One Size',
                'color' => 'Black',
                'selling_price' => 299.99,
                'discount_price' => 249.99,
                'short_descp' => 'Premium over-ear headphones',
                'long_descp' => 'Active noise cancellation, 30-hour battery, Bluetooth 5.0, built-in mic',
                'thambnail' => 'uploads/product/thambnail/headphones.webp',
                'vendor_id' => 11,
                'featured' => 1,
                'special_offer' => 0,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/headphones-1.webp',
                    'uploads/product/multi-img/headphones-2.webp',
                    'uploads/product/multi-img/headphones-3.webp'
                ]
            ],

            // 12. Fashion - Women's Clothing
            [
                'brand_id' => 12,
                'category_id' => 4,
                'subcategory_id' => 11,
                'name' => 'Women\'s Wrap Dress',
                'slug' => 'womens-wrap-dress',
                'code' => 'DR-' . rand(1000, 9999),
                'qty' => 90,
                'tags' => 'dress,women,summer',
                'size' => 'XS,S,M,L',
                'color' => 'Floral Print',
                'selling_price' => 59.99,
                'discount_price' => 49.99,
                'short_descp' => 'Flattering wrap dress',
                'long_descp' => 'V-neck wrap design, short sleeves, midi length, made from breathable rayon',
                'thambnail' => 'uploads/product/thambnail/wrap-dress.webp',
                'vendor_id' => 12,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/dress-1.webp',
                    'uploads/product/multi-img/dress-2.webp',
                    'uploads/product/multi-img/dress-3.webp'
                ]
            ],

            // 13. Appliances - Microwaves
            [
                'brand_id' => 13,
                'category_id' => 1,
                'subcategory_id' => 3,
                'name' => 'Countertop Microwave Oven',
                'slug' => 'countertop-microwave-oven',
                'code' => 'MW-' . rand(1000, 9999),
                'qty' => 30,
                'tags' => 'microwave,appliance,kitchen',
                'size' => '1.2 cu.ft',
                'color' => 'Black Stainless',
                'selling_price' => 149.99,
                'discount_price' => 119.99,
                'short_descp' => 'Compact microwave with sensor cooking',
                'long_descp' => '1000 watts, 10 power levels, auto-defrost, child safety lock',
                'thambnail' => 'uploads/product/thambnail/microwave.webp',
                'vendor_id' => 13,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/microwave-1.webp',
                    'uploads/product/multi-img/microwave-2.webp',
                    'uploads/product/multi-img/microwave-3.webp'
                ]
            ],

            // 14. Beauty - Hair Care
            [
                'brand_id' => 14,
                'category_id' => 2,
                'subcategory_id' => 5,
                'name' => 'Argan Oil Hair Mask',
                'slug' => 'argan-oil-hair-mask',
                'code' => 'HM-' . rand(1000, 9999),
                'qty' => 150,
                'tags' => 'haircare,arganoil,repair',
                'size' => '8 oz',
                'color' => null,
                'selling_price' => 22.99,
                'discount_price' => 18.99,
                'short_descp' => 'Deep conditioning treatment',
                'long_descp' => 'With argan oil and keratin to repair damaged hair, sulfate-free, paraben-free',
                'thambnail' => 'uploads/product/thambnail/hair-mask.webp',
                'vendor_id' => 14,
                'featured' => 1,
                'special_offer' => 0,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/hairmask-1.webp',
                    'uploads/product/multi-img/hairmask-2.webp',
                    'uploads/product/multi-img/hairmask-3.webp'
                ]
            ],

            // 15. Mobiles - Accessories
            [
                'brand_id' => 15,
                'category_id' => 8,
                'subcategory_id' => 23,
                'name' => 'Wireless Charging Pad',
                'slug' => 'wireless-charging-pad',
                'code' => 'WC-' . rand(1000, 9999),
                'qty' => 200,
                'tags' => 'charger,wireless,qi',
                'size' => '3.5" diameter',
                'color' => 'White',
                'selling_price' => 29.99,
                'discount_price' => 19.99,
                'short_descp' => 'Qi-certified wireless charger',
                'long_descp' => '10W fast charging, compatible with all Qi-enabled devices, LED indicator',
                'thambnail' => 'uploads/product/thambnail/wireless-charger.webp',
                'vendor_id' => 15,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/charger-1.webp',
                    'uploads/product/multi-img/charger-2.webp',
                    'uploads/product/multi-img/charger-3.webp'
                ]
            ],

            // 16. Groceries - Beverages
            [
                'brand_id' => 16,
                'category_id' => 6,
                'subcategory_id' => 19,
                'name' => 'Organic Cold Brew Coffee',
                'slug' => 'organic-cold-brew-coffee',
                'code' => 'CB-' . rand(1000, 9999),
                'qty' => 180,
                'tags' => 'coffee,beverage,coldbrew',
                'size' => '32 oz',
                'color' => null,
                'selling_price' => 7.99,
                'discount_price' => 5.99,
                'short_descp' => 'Smooth organic cold brew',
                'long_descp' => 'Made with 100% organic arabica beans, ready-to-drink, no added sugar',
                'thambnail' => 'uploads/product/thambnail/cold-brew.webp',
                'vendor_id' => 16,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/coffee-1.webp',
                    'uploads/product/multi-img/coffee-2.webp',
                    'uploads/product/multi-img/coffee-3.webp'
                ]
            ],

            // 17. Furniture - Office
            [
                'brand_id' => 17,
                'category_id' => 5,
                'subcategory_id' => 15,
                'name' => 'Ergonomic Office Chair',
                'slug' => 'ergonomic-office-chair',
                'code' => 'OC-' . rand(1000, 9999),
                'qty' => 20,
                'tags' => 'chair,office,ergonomic',
                'size' => 'Adjustable',
                'color' => 'Black',
                'selling_price' => 249.99,
                'discount_price' => 199.99,
                'short_descp' => 'Comfortable ergonomic chair',
                'long_descp' => 'Adjustable height, lumbar support, breathable mesh back, 360° swivel',
                'thambnail' => 'uploads/product/thambnail/office-chair.webp',
                'vendor_id' => 17,
                'featured' => 1,
                'special_offer' => 0,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/chair-1.webp',
                    'uploads/product/multi-img/chair-2.webp',
                    'uploads/product/multi-img/chair-3.webp'
                ]
            ],

            // 18. Travel - Camping Gear
            [
                'brand_id' => 18,
                'category_id' => 10,
                'subcategory_id' => 33,
                'name' => '4-Person Camping Tent',
                'slug' => '4-person-camping-tent',
                'code' => 'TN-' . rand(1000, 9999),
                'qty' => 15,
                'tags' => 'tent,camping,outdoor',
                'size' => '96" x 84"',
                'color' => 'Green',
                'selling_price' => 129.99,
                'discount_price' => 99.99,
                'short_descp' => 'Weather-resistant dome tent',
                'long_descp' => 'Sleeps 4, waterproof rainfly, mesh roof for ventilation, includes carry bag',
                'thambnail' => 'uploads/product/thambnail/camping-tent.webp',
                'vendor_id' => 18,
                'featured' => 0,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/tent-1.webp',
                    'uploads/product/multi-img/tent-2.webp',
                    'uploads/product/multi-img/tent-3.webp'
                ]
            ],

            // 19. Meat & Fish - Fish
            [
                'brand_id' => 19,
                'category_id' => 7,
                'subcategory_id' => 21,
                'name' => 'Fresh Atlantic Salmon Fillet',
                'slug' => 'fresh-atlantic-salmon-fillet',
                'code' => 'SF-' . rand(1000, 9999),
                'qty' => 45,
                'tags' => 'salmon,fish,seafood',
                'size' => '6 oz portion',
                'color' => null,
                'selling_price' => 12.99,
                'discount_price' => 9.99,
                'short_descp' => 'Fresh never-frozen salmon',
                'long_descp' => 'Wild-caught Atlantic salmon, rich in omega-3s, skin-on for flavor',
                'thambnail' => 'uploads/product/thambnail/salmon.webp',
                'vendor_id' => 19,
                'featured' => 1,
                'special_offer' => 0,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/salmon-1.webp',
                    'uploads/product/multi-img/salmon-2.webp',
                    'uploads/product/multi-img/salmon-3.webp'
                ]
            ],

            // 20. Sweet Home - Bedding
            [
                'brand_id' => 20,
                'category_id' => 9,
                'subcategory_id' => 27,
                'name' => 'Egyptian Cotton Sheet Set',
                'slug' => 'egyptian-cotton-sheet-set',
                'code' => 'SH-' . rand(1000, 9999),
                'qty' => 60,
                'tags' => 'sheets,bedding,luxury',
                'size' => 'Queen',
                'color' => 'White',
                'selling_price' => 129.99,
                'discount_price' => 89.99,
                'short_descp' => '600 thread count luxury sheets',
                'long_descp' => '100% Egyptian cotton, sateen weave, deep pockets for mattresses up to 16"',
                'thambnail' => 'uploads/product/thambnail/sheet-set.webp',
                'vendor_id' => 20,
                'featured' => 1,
                'special_offer' => 1,
                'status' => 1,
                'product_photos' => [
                    'uploads/product/multi-img/sheets-1.webp',
                    'uploads/product/multi-img/sheets-2.webp',
                    'uploads/product/multi-img/sheets-3.webp'
                ]
            ]
        ];

        foreach ($products as $productData) {
            $productPhotos = $productData['product_photos'];
            unset($productData['product_photos']);
            
            $product = product::create($productData);
            
            foreach ($productPhotos as $photo) {
                $product->photos()->create(['src' => $photo]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Whopper',
                'category' => 'whopper',
                'price' => 249,
                'image_url' => 'assets/products/whopper/whopper.webp',
            ],
            [
                'name' => 'Whopper Jr.',
                'category' => 'whopper',
                'price' => 149,
                'image_url' => 'assets/products/whopper/whopper_jr.webp',
            ],
            [
                'name' => '4-Cheese Whopper',
                'category' => 'whopper',
                'price' => 269,
                'image_url' => 'assets/products/whopper/4_cheese_whopper.webp',
            ],
            [
                'name' => '4-Cheese Whopper Jr.',
                'category' => 'whopper',
                'price' => 169,
                'image_url' => 'assets/products/whopper/4_cheese_whopper_jr.webp',
            ],

            [
                'name' => 'Angriest Whopper',
                'category' => 'featured',
                'price' => 279,
                'image_url' => 'assets/products/featured/angriest_whopper.webp',
            ],
            [
                'name' => 'Angriest 4-Cheese Whopper',
                'category' => 'featured',
                'price' => 299,
                'image_url' => 'assets/products/featured/angriest_4-cheese_whopper.webp',
            ],
            [
                'name' => 'Angriest X-tra Long Chicken',
                'category' => 'featured',
                'price' => 229,
                'image_url' => 'assets/products/featured/angriest_x-tra_long_chicken.webp',
            ],
            [
                'name' => 'Large Iced Matcha Espresso',
                'category' => 'featured',
                'price' => 129,
                'image_url' => 'assets/products/featured/large_iced_matcha_espresso.webp',
            ],

            [
                'name' => 'Plant-Based Whopper',
                'category' => 'plant_based_whopper',
                'price' => 259,
                'image_url' => 'assets/products/plant_based_whopper/plant_based_whopper.webp',
            ],
            [
                'name' => 'Plant-Based Whopper Jr.',
                'category' => 'plant_based_whopper',
                'price' => 159,
                'image_url' => 'assets/products/plant_based_whopper/plant_based_whopper_jr.webp',
            ],

            [
                'name' => 'Chicken King',
                'category' => 'chicken_king',
                'price' => 189,
                'image_url' => 'assets/products/chicken_king/chicken_king.webp',
            ],
            [
                'name' => 'Spicy Chicken King',
                'category' => 'chicken_king',
                'price' => 199,
                'image_url' => 'assets/products/chicken_king/spicy_chicken_king.webp',
            ],
            [
                'name' => 'BLT Spicy Chicken King',
                'category' => 'chicken_king',
                'price' => 219,
                'image_url' => 'assets/products/chicken_king/blt_spicy_chicken_king.webp',
            ],

            // Continue adding the remaining products
            // from your Flutter mockProducts list...
        ];

        foreach ($products as $product) {
            MenuItem::updateOrCreate(
                ['name' => $product['name']],
                [
                    'category' => $product['category'],
                    'price' => $product['price'],
                    'description' => $product['name'],
                    'image_url' => $product['image_url'],
                    'available' => true,
                ]
            );
        }
    }
}
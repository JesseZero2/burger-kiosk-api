<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::create([
            'name' => 'Whopper',
            'category' => 'Burgers',
            'price' => 189.00,
            'description' => 'Flame grilled beef burger',
            'image_url' => 'https://example.com/whopper.jpg',
            'available' => true
        ]);

        MenuItem::create([
            'name' => 'Cheeseburger',
            'category' => 'Burgers',
            'price' => 99.00,
            'description' => 'Classic cheeseburger',
            'image_url' => 'https://example.com/cheeseburger.jpg',
            'available' => true
        ]);

        MenuItem::create([
            'name' => 'French Fries',
            'category' => 'Fries',
            'price' => 79.00,
            'description' => 'Crispy golden fries',
            'image_url' => 'https://example.com/fries.jpg',
            'available' => true
        ]);

        MenuItem::create([
            'name' => 'Coke',
            'category' => 'Drinks',
            'price' => 59.00,
            'description' => 'Refreshing soda drink',
            'image_url' => 'https://example.com/coke.jpg',
            'available' => true
        ]);
    }
}
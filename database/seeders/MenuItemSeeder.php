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
        MenuItem::firstOrCreate([
            'name' => 'Whopper'
        ],[
            'category' => 'whopper',
            'price' => 189.00,
            'description' => 'Flame grilled beef burger',
            'image_url' => 'https://example.com/whopper.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Cheeseburger'
        ],[
            'category' => 'flame_grilled_cheeseburger',
            'price' => 99.00,
            'description' => 'Classic cheeseburger',
            'image_url' => 'https://example.com/cheeseburger.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Double Whopper'
        ],[
            'category' => 'whopper',
            'price' => 229.00,
            'description' => 'Extra beef patty burger',
            'image_url' => 'https://example.com/double-whopper.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Whopper with Cheese'
        ],[
            'category' => 'whopper',
            'price' => 199.00,
            'description' => 'Whopper topped with cheese',
            'image_url' => 'https://example.com/whopper-cheese.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Burger King Stacker'
        ],[
            'category' => 'king_specials',
            'price' => 259.00,
            'description' => 'Stacked burger with multiple patties',
            'image_url' => 'https://example.com/stacker.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Double Cheeseburger'
        ],[
            'category' => 'flame_grilled_cheeseburger',
            'price' => 129.00,
            'description' => 'Double patty cheeseburger',
            'image_url' => 'https://example.com/double-cheeseburger.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Chicken Sandwich'
        ],[
            'category' => 'chicken_king',
            'price' => 149.00,
            'description' => 'Crispy chicken sandwich',
            'image_url' => 'https://example.com/chicken-sandwich.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Spicy Chicken Sandwich'
        ],[
            'category' => 'chicken_king',
            'price' => 159.00,
            'description' => 'Spicy crispy chicken sandwich',
            'image_url' => 'https://example.com/spicy-chicken.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Whopper Meal'
        ],[
            'category' => 'group_meals',
            'price' => 329.00,
            'description' => 'Whopper with fries and drink meal',
            'image_url' => 'https://example.com/whopper-meal.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'BK Nuggets (6pcs)'
        ],[
            'category' => 'ultimate_sidekings',
            'price' => 99.00,
            'description' => '6-piece chicken nuggets',
            'image_url' => 'https://example.com/nuggets-6.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'BK Nuggets (12pcs)'
        ],[
            'category' => 'ultimate_sidekings',
            'price' => 149.00,
            'description' => '12-piece chicken nuggets',
            'image_url' => 'https://example.com/nuggets-12.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Regular Fries'
        ],[
            'category' => 'ultimate_sidekings',
            'price' => 69.00,
            'description' => 'Regular fries',
            'image_url' => 'https://example.com/regular-fries.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Coke Regular'
        ],[
            'category' => 'drinks',
            'price' => 59.00,
            'description' => 'Regular Coke drink',
            'image_url' => 'https://example.com/coke-regular.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'French Fries'
        ],[
            'category' => 'ultimate_sidekings',
            'price' => 79.00,
            'description' => 'Crispy golden fries',
            'image_url' => 'https://example.com/fries.jpg',
            'available' => true
        ]);

        MenuItem::firstOrCreate([
            'name' => 'Coke'
        ],[
            'category' => 'drinks',
            'price' => 59.00,
            'description' => 'Refreshing soda drink',
            'image_url' => 'https://example.com/coke.jpg',
            'available' => true
        ]);
    }
}
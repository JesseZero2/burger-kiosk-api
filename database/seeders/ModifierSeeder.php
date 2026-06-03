<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ModifierSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('modifiers')->delete();

        DB::table('modifiers')->insert([
            ['name' => 'Extra Patty',      'price_delta' => 59.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Extra Cheese',     'price_delta' => 20.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Extra Bacon',      'price_delta' => 39.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'No Onions',        'price_delta' => 0.00,   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'No Pickles',       'price_delta' => 0.00,   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'No Lettuce',       'price_delta' => 0.00,   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'No Tomatoes',      'price_delta' => 0.00,   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'No Mayo',          'price_delta' => 0.00,   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Extra Ketchup',    'price_delta' => 0.00,   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Upsize to Large',  'price_delta' => 30.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Add Egg',          'price_delta' => 25.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Spicy Sauce',      'price_delta' => 10.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'BBQ Sauce',        'price_delta' => 10.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ranch Sauce',      'price_delta' => 10.00,  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

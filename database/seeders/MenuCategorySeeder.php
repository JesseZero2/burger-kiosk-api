<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MenuCategorySeeder extends Seeder
{public function run(): void
{
    $now = Carbon::now();

    // Clear first, then re-insert cleanly
    DB::table('menu_categories')->truncate();

    DB::table('menu_categories')->insert([
        ['name' => 'all_day_breakfast',         'created_at' => $now, 'updated_at' => $now],
        ['name' => 'bk_cafe',                   'created_at' => $now, 'updated_at' => $now],
        ['name' => 'chicken_king',              'created_at' => $now, 'updated_at' => $now],
        ['name' => 'chicken_rice_meals',        'created_at' => $now, 'updated_at' => $now],
        ['name' => 'dessert',                   'created_at' => $now, 'updated_at' => $now],
        ['name' => 'drinks',                    'created_at' => $now, 'updated_at' => $now],
        ['name' => 'featured',                  'created_at' => $now, 'updated_at' => $now],
        ['name' => 'flame_grilled_cheeseburger','created_at' => $now, 'updated_at' => $now],
        ['name' => 'group_meals',               'created_at' => $now, 'updated_at' => $now],
        ['name' => 'king_savers_bundles',       'created_at' => $now, 'updated_at' => $now],
        ['name' => 'king_specials',             'created_at' => $now, 'updated_at' => $now],
        ['name' => 'plant_based_whopper',       'created_at' => $now, 'updated_at' => $now],
        ['name' => 'ultimate_sidekings',        'created_at' => $now, 'updated_at' => $now],
        ['name' => 'whopper',                   'created_at' => $now, 'updated_at' => $now],
        ['name' => 'xtra_long_chicken',         'created_at' => $now, 'updated_at' => $now],
    ]);
}
}

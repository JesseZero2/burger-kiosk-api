<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('menu_categories')->insertOrIgnore([
            ['name' => 'Burgers',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chicken',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sides',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Drinks',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Desserts',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Meals',     'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('order_items')->delete();

        $order1 = DB::table('orders')->where('order_number', 'BK-20260601-001')->value('id');
        $order2 = DB::table('orders')->where('order_number', 'BK-20260601-002')->value('id');
        $order3 = DB::table('orders')->where('order_number', 'BK-20260601-003')->value('id');

        $whopper      = DB::table('menu_items')->where('name', 'Whopper')->value('id');
        $whopperMeal  = DB::table('menu_items')->where('name', 'Whopper Meal')->value('id');
        $regFries     = DB::table('menu_items')->where('name', 'Regular Fries')->value('id');
        $cokeReg      = DB::table('menu_items')->where('name', 'Coke Regular')->value('id');
        $nuggets6     = DB::table('menu_items')->where('name', 'BK Nuggets (6pcs)')->value('id');
        $chickenSand  = DB::table('menu_items')->where('name', 'Chicken Sandwich')->value('id');

        DB::table('order_items')->insert([
            // Order 1 - just a Whopper
            [
                'order_id'     => $order1,
                'product_id'   => $whopper,
                'product_name' => 'Whopper',
                'quantity'     => 1,
                'price'        => 219.00,
                'subtotal'     => 219.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            // Order 2 - Whopper Meal
            [
                'order_id'     => $order2,
                'product_id'   => $whopperMeal,
                'product_name' => 'Whopper Meal',
                'quantity'     => 1,
                'price'        => 329.00,
                'subtotal'     => 329.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            // Order 3 - Chicken Sandwich + Nuggets + Fries + Coke
            [
                'order_id'     => $order3,
                'product_id'   => $chickenSand,
                'product_name' => 'Chicken Sandwich',
                'quantity'     => 1,
                'price'        => 149.00,
                'subtotal'     => 149.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'order_id'     => $order3,
                'product_id'   => $nuggets6,
                'product_name' => 'BK Nuggets (6pcs)',
                'quantity'     => 1,
                'price'        => 99.00,
                'subtotal'     => 99.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'order_id'     => $order3,
                'product_id'   => $regFries,
                'product_name' => 'Regular Fries',
                'quantity'     => 1,
                'price'        => 69.00,
                'subtotal'     => 69.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'order_id'     => $order3,
                'product_id'   => $cokeReg,
                'product_name' => 'Coke Regular',
                'quantity'     => 1,
                'price'        => 59.00,
                'subtotal'     => 59.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);
    }
}

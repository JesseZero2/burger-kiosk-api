<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderItemModifierSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // Get the Whopper order item from Order 1
        $order1       = DB::table('orders')->where('order_number', 'BK-20260601-001')->value('id');
        $whopperItem  = DB::table('order_items')->where('order_id', $order1)->where('product_name', 'Whopper')->value('id');

        // Get the Nuggets order item from Order 3
        $order3       = DB::table('orders')->where('order_number', 'BK-20260601-003')->value('id');
        $nuggetsItem  = DB::table('order_items')->where('order_id', $order3)->where('product_name', 'BK Nuggets (6pcs)')->value('id');
        $chickenItem  = DB::table('order_items')->where('order_id', $order3)->where('product_name', 'Chicken Sandwich')->value('id');

        $extraCheese = DB::table('modifiers')->where('name', 'Extra Cheese')->value('modifier_id');
        $noOnions    = DB::table('modifiers')->where('name', 'No Onions')->value('modifier_id');
        $bbqSauce    = DB::table('modifiers')->where('name', 'BBQ Sauce')->value('modifier_id');
        $spicySauce  = DB::table('modifiers')->where('name', 'Spicy Sauce')->value('modifier_id');

        DB::table('order_item_modifiers')->delete();

        DB::table('order_item_modifiers')->insert([
            // Whopper in order 1 - extra cheese, no onions
            [
                'order_item_id' => $whopperItem,
                'modifier_id'   => $extraCheese,
                'quantity'      => 1,
                'price_delta'   => 20.00,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'order_item_id' => $whopperItem,
                'modifier_id'   => $noOnions,
                'quantity'      => 1,
                'price_delta'   => 0.00,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],

            // Nuggets in order 3 - BBQ sauce
            [
                'order_item_id' => $nuggetsItem,
                'modifier_id'   => $bbqSauce,
                'quantity'      => 1,
                'price_delta'   => 10.00,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],

            // Chicken sandwich in order 3 - spicy sauce
            [
                'order_item_id' => $chickenItem,
                'modifier_id'   => $spicySauce,
                'quantity'      => 1,
                'price_delta'   => 10.00,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ]);
    }
}

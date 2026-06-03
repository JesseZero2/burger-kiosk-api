<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemModifierSeeder extends Seeder
{
    public function run(): void
    {
        // Get menu item IDs
        $whopper         = DB::table('menu_items')->where('name', 'Whopper')->value('id');
        $doubleWhopper   = DB::table('menu_items')->where('name', 'Double Whopper')->value('id');
        $whopperCheese   = DB::table('menu_items')->where('name', 'Whopper with Cheese')->value('id');
        $stacker         = DB::table('menu_items')->where('name', 'Burger King Stacker')->value('id');
        $cheeseburger    = DB::table('menu_items')->where('name', 'Cheeseburger')->value('id');
        $dblCheeseburger = DB::table('menu_items')->where('name', 'Double Cheeseburger')->value('id');
        $chickenSandwich = DB::table('menu_items')->where('name', 'Chicken Sandwich')->value('id');
        $spicyChicken    = DB::table('menu_items')->where('name', 'Spicy Chicken Sandwich')->value('id');
        $nuggets6        = DB::table('menu_items')->where('name', 'BK Nuggets (6pcs)')->value('id');
        $nuggets12       = DB::table('menu_items')->where('name', 'BK Nuggets (12pcs)')->value('id');
        $regFries        = DB::table('menu_items')->where('name', 'Regular Fries')->value('id');

        // Get modifier IDs
        $extraPatty   = DB::table('modifiers')->where('name', 'Extra Patty')->value('modifier_id');
        $extraCheese  = DB::table('modifiers')->where('name', 'Extra Cheese')->value('modifier_id');
        $extraBacon   = DB::table('modifiers')->where('name', 'Extra Bacon')->value('modifier_id');
        $noOnions     = DB::table('modifiers')->where('name', 'No Onions')->value('modifier_id');
        $noPickles    = DB::table('modifiers')->where('name', 'No Pickles')->value('modifier_id');
        $noLettuce    = DB::table('modifiers')->where('name', 'No Lettuce')->value('modifier_id');
        $noTomatoes   = DB::table('modifiers')->where('name', 'No Tomatoes')->value('modifier_id');
        $noMayo       = DB::table('modifiers')->where('name', 'No Mayo')->value('modifier_id');
        $extraKetchup = DB::table('modifiers')->where('name', 'Extra Ketchup')->value('modifier_id');
        $upsize       = DB::table('modifiers')->where('name', 'Upsize to Large')->value('modifier_id');
        $addEgg       = DB::table('modifiers')->where('name', 'Add Egg')->value('modifier_id');
        $spicySauce   = DB::table('modifiers')->where('name', 'Spicy Sauce')->value('modifier_id');
        $bbqSauce     = DB::table('modifiers')->where('name', 'BBQ Sauce')->value('modifier_id');
        $ranchSauce   = DB::table('modifiers')->where('name', 'Ranch Sauce')->value('modifier_id');

        DB::table('menu_item_modifiers')->delete();

        DB::table('menu_item_modifiers')->insert([
            // Whopper modifiers
            ['menu_item_id' => $whopper, 'modifier_id' => $extraPatty,   'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $whopper, 'modifier_id' => $extraCheese,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $whopper, 'modifier_id' => $extraBacon,   'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $whopper, 'modifier_id' => $noOnions,     'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopper, 'modifier_id' => $noPickles,    'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopper, 'modifier_id' => $noLettuce,    'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopper, 'modifier_id' => $noTomatoes,   'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopper, 'modifier_id' => $noMayo,       'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopper, 'modifier_id' => $extraKetchup, 'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopper, 'modifier_id' => $addEgg,       'is_required' => false, 'max_quantity' => 1],

            // Double Whopper modifiers
            ['menu_item_id' => $doubleWhopper, 'modifier_id' => $extraCheese,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $doubleWhopper, 'modifier_id' => $extraBacon,   'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $doubleWhopper, 'modifier_id' => $noOnions,     'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $doubleWhopper, 'modifier_id' => $noPickles,    'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $doubleWhopper, 'modifier_id' => $noLettuce,    'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $doubleWhopper, 'modifier_id' => $noTomatoes,   'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $doubleWhopper, 'modifier_id' => $noMayo,       'is_required' => false, 'max_quantity' => 1],

            // Whopper with Cheese modifiers
            ['menu_item_id' => $whopperCheese, 'modifier_id' => $extraPatty,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $whopperCheese, 'modifier_id' => $extraBacon,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $whopperCheese, 'modifier_id' => $noOnions,    'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopperCheese, 'modifier_id' => $noPickles,   'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $whopperCheese, 'modifier_id' => $noMayo,      'is_required' => false, 'max_quantity' => 1],

            // Stacker modifiers
            ['menu_item_id' => $stacker, 'modifier_id' => $extraPatty,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $stacker, 'modifier_id' => $extraCheese, 'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $stacker, 'modifier_id' => $extraBacon,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $stacker, 'modifier_id' => $noOnions,    'is_required' => false, 'max_quantity' => 1],

            // Cheeseburger modifiers
            ['menu_item_id' => $cheeseburger, 'modifier_id' => $extraCheese,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $cheeseburger, 'modifier_id' => $noOnions,     'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $cheeseburger, 'modifier_id' => $noPickles,    'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $cheeseburger, 'modifier_id' => $extraKetchup, 'is_required' => false, 'max_quantity' => 1],

            // Double Cheeseburger modifiers
            ['menu_item_id' => $dblCheeseburger, 'modifier_id' => $extraCheese,  'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $dblCheeseburger, 'modifier_id' => $extraBacon,   'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $dblCheeseburger, 'modifier_id' => $noOnions,     'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $dblCheeseburger, 'modifier_id' => $noPickles,    'is_required' => false, 'max_quantity' => 1],

            // Chicken Sandwich modifiers
            ['menu_item_id' => $chickenSandwich, 'modifier_id' => $extraCheese, 'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $chickenSandwich, 'modifier_id' => $noLettuce,   'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $chickenSandwich, 'modifier_id' => $noMayo,      'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $chickenSandwich, 'modifier_id' => $spicySauce,  'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $chickenSandwich, 'modifier_id' => $bbqSauce,    'is_required' => false, 'max_quantity' => 1],

            // Spicy Chicken Sandwich modifiers
            ['menu_item_id' => $spicyChicken, 'modifier_id' => $extraCheese, 'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $spicyChicken, 'modifier_id' => $noLettuce,   'is_required' => false, 'max_quantity' => 1],
            ['menu_item_id' => $spicyChicken, 'modifier_id' => $noMayo,      'is_required' => false, 'max_quantity' => 1],

            // Nuggets dipping sauces
            ['menu_item_id' => $nuggets6,  'modifier_id' => $bbqSauce,   'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $nuggets6,  'modifier_id' => $ranchSauce, 'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $nuggets6,  'modifier_id' => $spicySauce, 'is_required' => false, 'max_quantity' => 2],
            ['menu_item_id' => $nuggets12, 'modifier_id' => $bbqSauce,   'is_required' => false, 'max_quantity' => 3],
            ['menu_item_id' => $nuggets12, 'modifier_id' => $ranchSauce, 'is_required' => false, 'max_quantity' => 3],
            ['menu_item_id' => $nuggets12, 'modifier_id' => $spicySauce, 'is_required' => false, 'max_quantity' => 3],

            // Fries upsize
            ['menu_item_id' => $regFries, 'modifier_id' => $upsize, 'is_required' => false, 'max_quantity' => 1],
        ]);
    }
}

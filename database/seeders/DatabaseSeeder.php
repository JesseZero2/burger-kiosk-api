<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );

        $this->call([
            MenuCategorySeeder::class,
            ModifierSeeder::class,
            MenuItemSeeder::class,
            MenuItemModifierSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            OrderItemModifierSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
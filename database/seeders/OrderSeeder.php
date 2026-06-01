<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('orders')->insertOrIgnore([
            [
                'order_number' => 'BK-20260601-001',
                'queue_number' => 1,
                'order_type'   => 'dine_in',
                'status'       => 'completed',
                'subtotal'     => 219.00,
                'total'        => 219.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'order_number' => 'BK-20260601-002',
                'queue_number' => 2,
                'order_type'   => 'take_out',
                'status'       => 'completed',
                'subtotal'     => 329.00,
                'total'        => 329.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'order_number' => 'BK-20260601-003',
                'queue_number' => 3,
                'order_type'   => 'dine_in',
                'status'       => 'pending',
                'subtotal'     => 398.00,
                'total'        => 398.00,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);
    }
}

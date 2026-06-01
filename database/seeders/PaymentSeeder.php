<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $order1 = DB::table('orders')->where('order_number', 'BK-20260601-001')->value('id');
        $order2 = DB::table('orders')->where('order_number', 'BK-20260601-002')->value('id');

        DB::table('payments')->insertOrIgnore([
            [
                'order_id'        => $order1,
                'payment_method'  => 'cash',
                'amount'          => 239.00, // 219 + 20 extra cheese modifier
                'payment_status'  => 'completed',
                'transaction_ref' => 'TXN-20260601-001',
                'authorized_at'   => $now,
                'captured_at'     => $now,
            ],
            [
                'order_id'        => $order2,
                'payment_method'  => 'gcash',
                'amount'          => 329.00,
                'payment_status'  => 'completed',
                'transaction_ref' => 'TXN-20260601-002',
                'authorized_at'   => $now,
                'captured_at'     => $now,
            ],
        ]);
    }
}

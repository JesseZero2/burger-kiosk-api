<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'payment_status',
        'transaction_ref',
        'authorized_at',
        'captured_at',
    ];

    protected $casts = [
        'authorized_at' => 'datetime',
        'captured_at'   => 'datetime',
        'amount'        => 'decimal:2',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
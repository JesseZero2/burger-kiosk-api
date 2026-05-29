<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'queue_number',
        'order_type',
        'status',
        'subtotal',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

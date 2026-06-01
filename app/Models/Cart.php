<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'session_id',
        'order_type',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Recalculate and save the cart total from its items.
     */
    public function recalculateTotal(): void
    {
        $this->total = $this->items()->sum('subtotal');
        $this->save();
    }
}
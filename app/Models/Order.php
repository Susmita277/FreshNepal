<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $with = ['items.vendor'];
    protected $fillable = [
        'user_id',
        'total_amount',
        'subtotal',
        'delivery_charge',
        'status',
        'delivery_address',
        'city',
        'area',
        'payment_method',
        'order_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

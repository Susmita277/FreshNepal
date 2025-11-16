<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'user_id', // This acts as vendor_id
        'quantity',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id is vendor_id
    }
}
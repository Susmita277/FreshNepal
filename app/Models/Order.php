<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'vendor_id', 'total_amount', 'delivery_charge', 'status', 'delivery_address', 'payment_method', 'order_date'];

    public function user() { return $this->belongsTo(User::class); }
    public function vendor() { return $this->belongsTo(User::class, 'vendor_id'); }
    public function items() { return $this->hasMany(OrderItem::class); }
}

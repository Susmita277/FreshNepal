<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'description', 'price', 'unit', 'stock_quantity', 'image', 'status'];
    protected $casts = ['image' => 'array'];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'user_id','name', 'slug', 'description', 'price', 'unit_type', 'stock_quantity', 'image', 'status'];

    // Add this accessor to handle JSON images
    public function getImageAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // If value is JSON string, decode it
        if (is_string($value) && json_decode($value) !== null) {
            return json_decode($value, true);
        }

        // If value is already array, return it
        if (is_array($value)) {
            return $value;
        }

        // If it's a simple string, wrap it in array for consistency
        return [$value];
    }

    // Add this method to get first image URL
    public function getFirstImageUrlAttribute()
    {
        $images = $this->image;
        
        if (!$images || empty($images)) {
            return null;
        }

        $firstImage = is_array($images) ? $images[0] : $images;
        
        return asset('storage/' . $firstImage);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
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
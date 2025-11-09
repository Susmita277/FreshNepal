<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DeliveryCharge extends Model
{
    protected $fillable = ['vendor_id', 'area_name', 'charge', 'status'];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}

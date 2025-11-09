<?php

namespace App\Filament\Vendor\Resources\OrderItems\Pages;

use App\Filament\Vendor\Resources\OrderItems\OrderItemsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderItems extends CreateRecord
{
    protected static string $resource = OrderItemsResource::class;
}

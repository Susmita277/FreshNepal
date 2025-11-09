<?php

namespace App\Filament\Vendor\Resources\OrderItems\Pages;

use App\Filament\Vendor\Resources\OrderItems\OrderItemsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOrderItems extends ListRecords
{
    protected static string $resource = OrderItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

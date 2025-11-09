<?php

namespace App\Filament\Vendor\Resources\OrderItems\Pages;

use App\Filament\Vendor\Resources\OrderItems\OrderItemsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOrderItems extends EditRecord
{
    protected static string $resource = OrderItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

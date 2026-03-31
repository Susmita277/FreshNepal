<?php

namespace App\Filament\Vendor\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('status')
                ->options([
                    'pending'    => 'Pending',
                    'confirmed'  => 'Confirmed',
                    'processing' => 'Processing',
                    'shipped'    => 'Shipped',
                    'delivered'  => 'Delivered',
                    'cancelled'  => 'Cancelled',
                ])
                ->required(),
        ]);
    }
}
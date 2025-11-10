<?php

namespace App\Filament\Vendor\Resources\Orders\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {

        return $schema->schema([
            Select::make('user_id')
                ->relationship('user', 'name')
                ->label('Customer')
                ->required(),

            TextInput::make('total_amount')
                ->numeric()
                ->required(),

            TextInput::make('delivery_charge')
                ->numeric(),

            Textarea::make('delivery_address')
                ->required(),

            Select::make('payment_method')
                ->options([
                    'Cash on Delivery' => 'Cash on Delivery',
                    'eSewa' => 'eSewa',
                    'Khalti' => 'Khalti',
                ])
                ->required(),
        ]);
    }
}

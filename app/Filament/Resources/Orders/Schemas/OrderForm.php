<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = auth()->user();
        $isVendor = $user->user_type === 'vendor' || $user->hasRole('vendor');
        
        $components = [
            Select::make('user_id')
                ->relationship('user', 'name')
                ->required()
                ->searchable()
                ->preload()
                ->hidden($isVendor),
            
            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'processing' => 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'cancelled' => 'Cancelled',
                ])
                ->required()
                ->default('pending'),
            
            TextInput::make('total_amount')
                ->required()
                ->numeric()
                ->prefix('NPR')
                ->disabled($isVendor),
            
            TextInput::make('subtotal')
                ->required()
                ->numeric()
                ->prefix('NPR')
                ->disabled($isVendor),
            
            TextInput::make('delivery_charge')
                ->required()
                ->numeric()
                ->prefix('NPR')
                ->default(0)
                ->disabled($isVendor),
            
            Textarea::make('delivery_address')
                ->required()
                ->columnSpanFull()
                ->disabled($isVendor),
            
            TextInput::make('city')
                ->required()
                ->maxLength(255)
                ->disabled($isVendor),
            
            TextInput::make('area')
                ->required()
                ->maxLength(255)
                ->disabled($isVendor),
            
            Select::make('payment_method')
                ->options([
                    'Cash on Delivery' => 'Cash on Delivery',
                    'Khalti' => 'Khalti',
                    'Esewa' => 'Esewa',
                ])
                ->required()
                ->default('Cash on Delivery')
                ->disabled($isVendor),
            
            DateTimePicker::make('order_date')
                ->required()
                ->disabled($isVendor),
        ];

        return $schema->components($components);
    }
}
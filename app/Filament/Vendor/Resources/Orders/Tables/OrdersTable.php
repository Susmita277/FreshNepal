<?php

namespace App\Filament\Vendor\Resources\Orders\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Order #')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending'    => 'warning',
                        'confirmed'  => 'info',
                        'processing' => 'info',
                        'shipped'    => 'primary',
                        'delivered'  => 'success',
                        'cancelled'  => 'danger',
                        default      => 'gray',
                    }),

                TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('NPR')
                    ->sortable(),

                TextColumn::make('payment_method')
                    ->label('Payment'),

                TextColumn::make('city')
                    ->label('City'),

        
                TextColumn::make('items.product.name')
                    ->label('Product Name')
                    ->listWithLineBreaks(), 

                TextColumn::make('delivery_address')
                    ->label('Address'),

                TextColumn::make('order_date')
                    ->label('Order Date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(), // vendor can only edit status
            ])
            ->toolbarActions([]); // no bulk delete for vendor
    }
}

<?php

namespace App\Filament\Vendor\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Table;


class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('Order ID')->sortable(),
                TextColumn::make('user.name')->label('Customer Name'),
                TextColumn::make('total_amount')->money('NPR'),
                TextColumn::make('status')->badge(),
                TextColumn::make('order_date')->dateTime('Y-m-d H:i'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

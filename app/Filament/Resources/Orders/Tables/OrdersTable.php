<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        $user = Auth::user();

        $isAdmin = ($user->role ?? null) === 'admin';
        $isVendor = ($user->role ?? null) === 'vendor';

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
                    ->color(fn (string $state): string => match ($state) {
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
                    ->label('Payment')
                    ->searchable(),

                TextColumn::make('city')
                    ->label('City')
                    ->searchable()
                    ->toggleable(),

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
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->visible(fn () => $isAdmin),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->visible(fn () => $isAdmin),
                ]),
            ]);
    }
}
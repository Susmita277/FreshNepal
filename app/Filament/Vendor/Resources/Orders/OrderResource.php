<?php

namespace App\Filament\Vendor\Resources\Orders;

use App\Filament\Vendor\Resources\Orders\Pages\CreateOrder;
use App\Filament\Vendor\Resources\Orders\Pages\EditOrder;
use App\Filament\Vendor\Resources\Orders\Pages\ListOrders;
use App\Filament\Vendor\Resources\Orders\Schemas\OrderForm;
use App\Filament\Vendor\Resources\Orders\Tables\OrdersTable;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'orders';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('vendor_id', Auth::id());
    }


    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['vendor_id'] = Auth::id();
        return $data;
    }
    public static function form(Schema $schema): Schema
    {
        return OrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrdersTable::configure($table);
    }





    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }
}

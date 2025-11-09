<?php

namespace App\Filament\Resources\DeliveryCharges;

use App\Filament\Resources\DeliveryCharges\Pages\CreateDeliveryCharge;
use App\Filament\Resources\DeliveryCharges\Pages\EditDeliveryCharge;
use App\Filament\Resources\DeliveryCharges\Pages\ListDeliveryCharges;
use App\Filament\Resources\DeliveryCharges\Schemas\DeliveryChargeForm;
use App\Filament\Resources\DeliveryCharges\Tables\DeliveryChargesTable;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use App\Models\DeliveryCharge;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryChargeResource extends Resource
{
    protected static ?string $model = DeliveryCharge::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'DeliveryCharge';


    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('area_name')->required(),
            TextInput::make('charge')->numeric()->required(),
            Toggle::make('status')->default(true),
        ]);
    }


    public static function table(Table $table): Table
    {
        return DeliveryChargesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDeliveryCharges::route('/'),
            'create' => CreateDeliveryCharge::route('/create'),
            'edit' => EditDeliveryCharge::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

<?php

namespace App\Filament\Resources\Orders;

use App\Filament\Resources\Orders\Pages\CreateOrder;
use App\Filament\Resources\Orders\Pages\EditOrder;
use App\Filament\Resources\Orders\Pages\ListOrders;
use App\Filament\Resources\Orders\Schemas\OrderForm;
use App\Filament\Resources\Orders\Tables\OrdersTable;
use App\Models\Order;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return OrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrdersTable::configure($table);
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
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        
        // DEBUG: Check user role fields
        // \Log::info('User role check:', [
        //     'user_id' => $user->id,
        //     'is_admin' => $user->is_admin ?? 'not set',
        //     'role' => $user->role ?? 'not set',
        //     'user_type' => $user->user_type ?? 'not set'
        // ]);

        // Check for ADMIN first (highest priority)
        if (($user->is_admin ?? false) === 1 || ($user->is_admin ?? false) === true) {
            return parent::getEloquentQuery(); // Admin sees ALL orders
        }
        
        if (($user->role ?? null) === 'admin') {
            return parent::getEloquentQuery(); // Admin sees ALL orders
        }

        // Check for VENDOR second
        if (($user->user_type ?? null) === 'vendor' || ($user->role ?? null) === 'vendor') {
            // Vendor sees ONLY orders with their products
            return parent::getEloquentQuery()
                ->whereHas('items', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
        }

        // Default - regular CUSTOMER sees only their own orders
        return parent::getEloquentQuery()->where('user_id', $user->id);
    }

    public static function getNavigationLabel(): string
    {
        $user = auth()->user();
        
        // Vendor sees "My Orders"
        if (($user->user_type ?? null) === 'vendor' || ($user->role ?? null) === 'vendor') {
            return 'My Orders';
        }
        
        // Admin sees "Orders"
        return 'Orders';
    }

    public static function getPluralModelLabel(): string
    {
        $user = auth()->user();
        
        // Vendor sees "My Orders"
        if (($user->user_type ?? null) === 'vendor' || ($user->role ?? null) === 'vendor') {
            return 'My Orders';
        }
        
        // Admin sees "Orders"
        return 'Orders';
    }

    public static function canCreate(): bool
    {
        $user = auth()->user();
        
        // Only admin can create orders manually
        return ($user->is_admin ?? false) === 1 || 
               ($user->is_admin ?? false) === true || 
               ($user->role ?? null) === 'admin';
    }

    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
        
        // Show to admin and vendor, hide from regular customers
        return ($user->is_admin ?? false) === 1 || 
               ($user->is_admin ?? false) === true || 
               ($user->role ?? null) === 'admin' ||
               ($user->user_type ?? null) === 'vendor' ||
               ($user->role ?? null) === 'vendor';
    }
}
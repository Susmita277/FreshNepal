<?php

namespace App\Filament\Vendor\Resources\Products;

use App\Filament\Vendor\Resources\Products\Pages\CreateProduct;
use App\Filament\Vendor\Resources\Products\Pages\EditProduct;
use App\Filament\Vendor\Resources\Products\Pages\ListProducts;
use App\Filament\Vendor\Resources\Products\Schemas\ProductForm;
use App\Filament\Vendor\Resources\Products\Tables\ProductsTable;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Products';





    public static function form(Schema $schema): Schema
    {
        return ProductForm::configure($schema);
    }


    public static function table(Table $table): Table
    {
        return ProductsTable::configure($table);
    }
    public static function getEloquentQuery(): Builder
    {
        // Show only products belonging to the authenticated vendor
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id());
    }

  
    protected static function handleRecordCreation(array $data): Product
    {
        \Log::info('=== PRODUCT CREATION START ===');
        \Log::info('Auth::id(): ' . (Auth::id() ?? 'NULL'));
        \Log::info('Auth check: ' . (Auth::check() ? 'YES' : 'NO'));

        // Handle image array conversion
        if (isset($data['image']) && is_array($data['image'])) {
            $data['image'] = $data['image'][0] ?? null;
        }

        // FORCE set the vendor ID - this is the fix
        $vendorId = Auth::id();

        if (!$vendorId) {
            \Log::error('❌ NO AUTHENTICATED USER FOUND!');
            // You might need to log in again
            throw new \Exception('No authenticated user found. Please log in again.');
        }

        $data['user_id'] = $vendorId;

        \Log::info('Creating product with data:', [
            'vendor_id' => $vendorId,
            'vendor_name' => Auth::user()->name ?? 'Unknown',
            'product_name' => $data['name'] ?? 'No name'
        ]);

        $product = static::getModel()::create($data);

        \Log::info('✅ Product created:', [
            'product_id' => $product->id,
            'user_id_set' => $product->user_id
        ]);

        return $product;
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }


    public static function canViewAny(): bool
    {

        return Auth::check() && (
            Auth::user()->role === 'vendor'
        );
    }
}

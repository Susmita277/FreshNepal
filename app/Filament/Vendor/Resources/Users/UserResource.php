<?php

namespace App\Filament\Vendor\Resources\Users;

use App\Filament\Vendor\Resources\Users\Pages\CreateUser;
use App\Filament\Vendor\Resources\Users\Pages\EditUser;
use App\Filament\Vendor\Resources\Users\Pages\ListUsers;
use App\Filament\Vendor\Resources\Users\Schemas\UserForm;
use App\Filament\Vendor\Resources\Users\Tables\UsersTable;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Users';

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', 'customer') // only show customers
            ->whereHas('orders', function (Builder $query) {
                $query->where('vendor_id', Auth::id());
            });
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit($record): bool
    {
        return false;
    }
}

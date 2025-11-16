<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth; // ADD THIS IMPORT

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        $user = Auth::user(); // Fixed
        
        // Check for ADMIN first
        $isAdmin = ($user->is_admin ?? false) === 1 || 
                  ($user->is_admin ?? false) === true || 
                  ($user->role ?? null) === 'admin';
        
        // Check for VENDOR second  
        $isVendor = !$isAdmin && (($user->user_type ?? null) === 'vendor' || ($user->role ?? null) === 'vendor');
        
        $columns = [
            // ... your columns remain the same
        ];

        return $table
            ->columns($columns)
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
            ])
            ->modifyQueryUsing(function (Builder $query) use ($user, $isAdmin, $isVendor) {
                // Apply role-based filtering
                if ($isVendor) {
                    return $query->whereHas('items', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    });
                }
                
                return $query;
            });
    }
}
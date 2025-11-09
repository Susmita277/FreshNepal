<?php

namespace App\Filament\Vendor\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;


class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

            
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignorable: fn($record) => $record),

                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category')
                    ->required()
                    ->searchable(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3),

                Select::make('unit_type')
                    ->label('Unit Type')
                    ->options([
                        'kg' => 'Kg',
                        'piece' => 'Piece',
                    ])
                    ->required(),

                TextInput::make('price')
                    ->label('Price per Unit')
                    ->numeric()
                    ->required(),

                TextInput::make('quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->required()
                    ->helperText(fn($get) => $get('unit_type') === 'kg'
                        ? 'Enter weight in kg (fractional allowed, e.g., 0.5)'
                        : 'Enter number of pieces'),

                FileUpload::make('image')
                    ->label('Product Image')
                    ->image()
                    ->required(),




                Select::make('status')
                    ->label('Status')
                    ->options([
                        'available' => 'Available',
                        'unavailable' => 'Unavailable',
                    ])
                    ->required(),
                    
            ]);
    }
}

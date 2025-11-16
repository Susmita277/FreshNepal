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
                \Filament\Forms\Components\Hidden::make('user_id')
                    ->default(fn() => \Illuminate\Support\Facades\Auth::id())
                    ->required(),
                    
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
                    ->required()
                    ->reactive(),


                TextInput::make('price')
                    ->label('Price per Unit')
                    ->numeric()
                    ->required(),

                TextInput::make('stock_quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->required()
                    ->helperText(fn($get) => $get('unit_type') === 'kg'
                        ? 'Enter weight in kg (fractional allowed, e.g., 0.5)'
                        : 'Enter number of pieces'),



                FileUpload::make('image')
                    ->label('Product Image')
                    ->image()
                    ->required()
                    ->directory('products')
                    ->disk('public')
                    ->preserveFilenames()
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])
                    ->storeFileNamesIn('image'),




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

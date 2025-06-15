<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CinemaResource\Pages;
use App\Models\Cinema;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class CinemaResource extends Resource
{
    protected static ?string $model = Cinema::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    protected static ?string $navigationGroup = 'Cinema Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Poster Image')
                    ->image()
                    ->directory('cinemas')
                    ->nullable(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('city')
                    ->default('Yogyakarta')
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->maxLength(20)
                    ->nullable(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->nullable(),

                Forms\Components\TextInput::make('website')
                    ->url()
                    ->nullable(),

                Forms\Components\TextInput::make('latitude')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('longitude')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('opening_hours')
                    ->nullable(),

                Forms\Components\Textarea::make('description')
                    ->nullable(),

                Forms\Components\TextInput::make('rating')
                    ->numeric()
                    ->nullable(),

                Forms\Components\TextInput::make('total_reviews')
                    ->numeric()
                    ->nullable(),

                Forms\Components\TagsInput::make('facilities')
                    ->nullable(),

                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Poster')
                    ->square(),

                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('city')->searchable(),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCinemas::route('/'),
            'create' => Pages\CreateCinema::route('/create'),
            'edit' => Pages\EditCinema::route('/{record}/edit'),
            'view' => Pages\ViewCinema::route('/{record}'),
        ];
    }
}

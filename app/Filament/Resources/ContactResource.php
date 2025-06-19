<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\ContactResource\Pages;
    use App\Models\Contact;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables\Table;

    use Filament\Forms;
    use Filament\Tables;
    use Filament\Forms\Components\Toggle; 
    use Filament\Tables\Columns\ToggleColumn; 

    class ContactResource extends Resource
    {
        protected static ?string $model = Contact::class;

        protected static ?string $navigationIcon = 'heroicon-o-envelope';

        public static function form(Form $form): Form
        {
            return $form->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('email'),
                Forms\Components\TextInput::make('subject'),
                Forms\Components\Textarea::make('message'),
                Toggle::make('is_read')->label('Sudah dibaca'),
            ]);
        }

        public static function table(Table $table): Table
        {
            return $table->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('subject'),
                Tables\Columns\TextColumn::make('message'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),

                // Modified line: Removed trueLabel() and falseLabel()
                ToggleColumn::make('is_read') 
                    ->label('Sudah dibaca'),
            ]);
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListContacts::route('/'),
            ];
        }
    }
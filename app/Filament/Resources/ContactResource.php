<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'Informasi Kontak';
    protected static ?string $pluralLabel = 'Informasi Kontak';
    protected static ?string $navigationGroup = 'Tentang';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('type')
                ->options([
                    'whatsapp' => 'WhatsApp',
                    'email' => 'Email',
                    'instagram' => 'Instagram',
                    'telegram' => 'Telegram',
                    'facebook' => 'Facebook',
                    'website' => 'Website',
                    'other' => 'Other',
                ])
                ->required(),

            Forms\Components\TextInput::make('label')->required(),

            Forms\Components\TextInput::make('value')->required(),

            Forms\Components\TextInput::make('icon')
                ->placeholder('Optional icon class (ex: bi bi-instagram)')
                ->label('Icon Class'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->sortable(),
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('value'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}

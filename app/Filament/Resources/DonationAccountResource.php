<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationAccountResource\Pages;
use App\Models\DonationAccount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DonationAccountResource extends Resource
{
    protected static ?string $model = DonationAccount::class;

    protected static ?string $navigationGroup = 'Donasi';
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Akun Bank Donasi';

    protected static ?string $pluralLabel = 'Akun Bank Donasi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('bank_name')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('account_number')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('account_holder')
                ->required()
                ->maxLength(100),

            Forms\Components\Textarea::make('note')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bank_name'),
                TextColumn::make('account_number'),
                TextColumn::make('account_holder'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDonationAccounts::route('/'),
            'create' => Pages\CreateDonationAccount::route('/create'),
            'edit' => Pages\EditDonationAccount::route('/{record}/edit'),
        ];
    }
}

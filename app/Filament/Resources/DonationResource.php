<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Filament\Resources\DonationResource\RelationManagers;
use App\Models\Donation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Donasi Masuk';
    protected static ?string $pluralLabel = 'Donasi Masuk';
    protected static ?string $navigationGroup = 'Donasi';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('donor_name')->label('Donor Name'),
            Forms\Components\TextInput::make('donor_email')->label('Donor Email')->email(),
            Forms\Components\TextInput::make('amount')
                ->numeric()
                ->required()
                ->label('Amount (Rp)'),
            Forms\Components\Textarea::make('note'),
            Forms\Components\DateTimePicker::make('donated_at')->required(),
            Forms\Components\FileUpload::make('proof')
                ->disk('public')
                ->directory('donations/proof')
                ->image()
                ->label('Proof (Optional)'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('donor_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->money('IDR', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('donated_at')->label('Tanggal')->dateTime()->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}

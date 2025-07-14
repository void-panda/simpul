<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityResource\Pages;
use App\Models\Community;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CommunityResource extends Resource
{
     protected static ?string $model = Community::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Profil Komunitas';
    protected static ?string $navigationGroup = 'Tentang';


    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),
            RichEditor::make('description')->required(),
            RichEditor::make('vision')->required(),
            RichEditor::make('mission')->required(),
            TextInput::make('email')->required(),
            TextInput::make('phone')->required(),
            TextInput::make('address')->required(),
            TextInput::make('website')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\EditCommunity::route('/1/edit'),
        ];
    }
}

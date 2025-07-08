<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{DatePicker, TextInput,  FileUpload, RichEditor, Select, Textarea};

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Berita';

    protected static ?string $modelLabel = 'Berita';
    protected static ?string $navigationGroup = 'Acara';


    protected static ?string $pluralLabel = 'Berita';


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $state, callable $set) {
                    $set('slug', \Illuminate\Support\Str::slug($state));
                }),

            TextInput::make('slug')
                ->disabled()
                ->dehydrated()
                ->required(),

            // Textarea::make('excerpt')
            //     ->rows(3)
            //     ->disabled()
            //     ->dehydrated()
            //     ->label('Excerpt')
            //     ->helperText('Cuplikan singkat (dibuat otomatis)'),

            Select::make('category')
                ->options([
                    'press-release' => 'Press Release',
                    'event-report' => 'Event Report',
                    'announcement' => 'Announcement',
                ])
                ->nullable(),

            FileUpload::make('cover_image')
                ->image()
                ->disk('public')
                ->directory('news/covers'),

            DatePicker::make('published_at')
                ->label('Published At')
                ->default(now())
                ->nullable(),

            RichEditor::make('content')
                ->columnSpanFull()
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $state, callable $set) {
                    $set('excerpt', \Illuminate\Support\Str::slug($state));
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'press-release' => 'primary',
                        'event-report' => 'success',
                        'announcement' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

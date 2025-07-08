<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Acara';
    protected static ?string $navigationLabel = 'Events';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $state, callable $set) {
                    $set('slug', \Illuminate\Support\Str::slug($state));
                }),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->disabled()
                ->dehydrated()
                ->unique(ignoreRecord: true),

            // Forms\Components\Textarea::make('excerpt')
            //     ->rows(3)
            //     ->label('Excerpt')
            //     ->dehydrated()
            //     ->disabled()
            //     ->helperText('Cuplikan singkat event (jika kosong, akan diisi otomatis).'),

            Forms\Components\RichEditor::make('description')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $state, callable $set) {
                    $set('slug', \Illuminate\Support\Str::slug($state));
                }),

            Forms\Components\DatePicker::make('start_date')
                ->required(),

            Forms\Components\DatePicker::make('end_date'),

            Forms\Components\TextInput::make('location')
                ->maxLength(255),

            Forms\Components\FileUpload::make('cover_image')
                ->disk('public')
                ->directory('events/covers')
                ->image(),

            Forms\Components\Select::make('status')
                ->options([
                    'upcoming' => 'Upcoming',
                    'ongoing' => 'Ongoing',
                    'past' => 'Past',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('start_date')->date(),
                Tables\Columns\TextColumn::make('end_date')->date(),
                Tables\Columns\TextColumn::make('location')->limit(20)->tooltip(fn($record) => $record->location),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'primary' => 'upcoming',
                        'warning' => 'ongoing',
                        'gray' => 'past',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'upcoming' => 'Upcoming',
                        'ongoing' => 'Ongoing',
                        'past' => 'Past',
                    ]),
            ])
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}

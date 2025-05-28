<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimelineEventResource\Pages;
use App\Models\TimelineEvent;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class TimelineEventResource extends Resource
{
    protected static ?string $model = TimelineEvent::class;
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'Історія';
    protected static ?string $modelLabel = 'Хронологічна подія';
    protected static ?string $pluralModelLabel = 'Хронологія';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('date')
                    ->label('Рік')
                    ->numeric()
                    ->required(),

                TextInput::make('event')
                    ->label('Подія')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('date')
                    ->label('Рік')
                    ->sortable(),
                TextColumn::make('event')
                    ->label('Подія')
                    ->searchable()
                    ->limit(100),
                TextColumn::make('created_at')
                    ->label('Створено')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTimelineEvents::route('/'),
            'create' => Pages\CreateTimelineEvent::route('/create'),
            'edit'   => Pages\EditTimelineEvent::route('/{record}/edit'),
        ];
    }
}

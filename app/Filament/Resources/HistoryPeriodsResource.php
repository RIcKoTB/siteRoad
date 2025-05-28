<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryPeriodsResource\Pages;
use App\Models\HistoryPeriods;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class HistoryPeriodsResource extends Resource
{
    protected static ?string $model = HistoryPeriods::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Історія';
    protected static ?string $modelLabel = 'Історичний період';
    protected static ?string $pluralModelLabel = 'Історичні періоди';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Назва')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Опис')
                    ->rows(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Назва')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Опис')
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Створено')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Додайте фільтри за потреби
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
            // Вкажіть RelationManagers, якщо потрібно
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHistoryPeriods::route('/'),
            'create' => Pages\CreateHistoryPeriods::route('/create'),
            'edit'   => Pages\EditHistoryPeriods::route('/{record}/edit'),
        ];
    }
}

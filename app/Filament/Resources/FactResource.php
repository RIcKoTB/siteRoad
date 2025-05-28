<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FactResource\Pages;
use App\Models\Fact;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class FactResource extends Resource
{
    protected static ?string $model = Fact::class;
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationGroup = 'Історія';
    protected static ?string $modelLabel = 'Факт';
    protected static ?string $pluralModelLabel = 'Факти';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('fact')
                    ->label('Факт')
                    ->rows(3)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('fact')
                    ->label('Факт')
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
            'index'  => Pages\ListFacts::route('/'),
            'create' => Pages\CreateFact::route('/create'),
            'edit'   => Pages\EditFact::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\HistoryPeriodsResource\Pages;

use App\Filament\Resources\HistoryPeriodsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoryPeriods extends ListRecords
{
    protected static string $resource = HistoryPeriodsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

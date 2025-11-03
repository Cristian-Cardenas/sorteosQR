<?php

namespace App\Filament\Resources\Ganadors\Pages;

use App\Filament\Resources\Ganadors\GanadorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGanadors extends ListRecords
{
    protected static string $resource = GanadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

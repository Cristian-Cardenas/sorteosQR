<?php

namespace App\Filament\Resources\Ganadors\Pages;

use App\Filament\Resources\Ganadors\GanadorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGanador extends EditRecord
{
    protected static string $resource = GanadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\QrTiendas\Pages;

use App\Filament\Resources\QrTiendas\QrTiendaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQrTiendas extends ListRecords
{
    protected static string $resource = QrTiendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\QrTiendas\Pages;

use App\Filament\Resources\QrTiendas\QrTiendaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQrTienda extends EditRecord
{
    protected static string $resource = QrTiendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

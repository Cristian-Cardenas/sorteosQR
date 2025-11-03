<?php

namespace App\Filament\Resources\QrTiendas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QrTiendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sorteo_id')
                    ->required()
                    ->numeric(),
                TextInput::make('tienda_id')
                    ->required()
                    ->numeric(),
                TextInput::make('codigo_qr')
                    ->required(),
                TextInput::make('url_qr')
                    ->required(),
            ]);
    }
}

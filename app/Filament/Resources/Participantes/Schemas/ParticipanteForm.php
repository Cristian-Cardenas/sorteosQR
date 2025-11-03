<?php

namespace App\Filament\Resources\Participantes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ParticipanteForm
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
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('cedula')
                    ->required(),
                TextInput::make('telefono')
                    ->tel()
                    ->required(),
                TextInput::make('correo')
                    ->required(),
            ]);
    }
}

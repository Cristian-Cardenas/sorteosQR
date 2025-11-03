<?php

namespace App\Filament\Resources\Ganadors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GanadorForm
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
                TextInput::make('participante_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}

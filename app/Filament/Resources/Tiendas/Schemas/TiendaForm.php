<?php

namespace App\Filament\Resources\Tiendas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TiendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
            ]);
    }
}

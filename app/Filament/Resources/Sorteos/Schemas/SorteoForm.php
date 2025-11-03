<?php

namespace App\Filament\Resources\Sorteos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SorteoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('descripcion')
                    ->required(),
                TextInput::make('boletas')
                    ->required()
                    ->numeric(),
                // Toggle::make('estado')
                //     ->required(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Premios\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PremioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sorteo_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('descripcion')
                    ->required(),
                TextInput::make('orden')
                    ->required()
                    ->numeric(),
            ]);
    }
}

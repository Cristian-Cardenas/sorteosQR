<?php

namespace App\Filament\Resources\Sorteos\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SorteoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('descripcion'),
                TextEntry::make('boletas')
                    ->numeric(),
                TextEntry::make('participantes_count')
                    ->label('Participantes')
                    ->counts('participantes'),
                // IconEntry::make('estado')
                //     ->boolean(),
                TextEntry::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

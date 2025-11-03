<?php

namespace App\Filament\Resources\Ganadors;

use App\Filament\Resources\Ganadors\Pages\CreateGanador;
use App\Filament\Resources\Ganadors\Pages\EditGanador;
use App\Filament\Resources\Ganadors\Pages\ListGanadors;
use App\Filament\Resources\Ganadors\Schemas\GanadorForm;
use App\Filament\Resources\Ganadors\Tables\GanadorsTable;
use App\Models\Ganador;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GanadorResource extends Resource
{
    protected static ?string $model = Ganador::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GanadorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GanadorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGanadors::route('/'),
            'create' => CreateGanador::route('/create'),
            'edit' => EditGanador::route('/{record}/edit'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}

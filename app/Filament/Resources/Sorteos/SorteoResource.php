<?php

namespace App\Filament\Resources\Sorteos;

use App\Filament\Resources\Sorteos\Pages\CreateSorteo;
use App\Filament\Resources\Sorteos\Pages\EditSorteo;
use App\Filament\Resources\Sorteos\Pages\ListSorteos;
use App\Filament\Resources\Sorteos\Pages\ViewSorteo;
use App\Filament\Resources\Sorteos\Schemas\SorteoForm;
use App\Filament\Resources\Sorteos\Schemas\SorteoInfolist;
use App\Filament\Resources\Sorteos\Tables\SorteosTable;
use App\Models\Sorteo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SorteoResource extends Resource
{
    protected static ?string $model = Sorteo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return SorteoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SorteoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SorteosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PremiosRelationManager::class,
            RelationManagers\QrTiendasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSorteos::route('/'),
            'create' => CreateSorteo::route('/create'),
            'view' => ViewSorteo::route('/{record}'),
            'edit' => EditSorteo::route('/{record}/edit'),
        ];
    }
}

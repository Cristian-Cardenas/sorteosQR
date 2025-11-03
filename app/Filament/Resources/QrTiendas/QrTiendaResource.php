<?php

namespace App\Filament\Resources\QrTiendas;

use App\Filament\Resources\QrTiendas\Pages\CreateQrTienda;
use App\Filament\Resources\QrTiendas\Pages\EditQrTienda;
use App\Filament\Resources\QrTiendas\Pages\ListQrTiendas;
use App\Filament\Resources\QrTiendas\Schemas\QrTiendaForm;
use App\Filament\Resources\QrTiendas\Tables\QrTiendasTable;
use App\Models\QrTienda;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QrTiendaResource extends Resource
{
    protected static ?string $model = QrTienda::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return QrTiendaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QrTiendasTable::configure($table);
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
            'index' => ListQrTiendas::route('/'),
            'create' => CreateQrTienda::route('/create'),
            'edit' => EditQrTienda::route('/{record}/edit'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}

<?php

namespace App\Filament\Resources\Sorteos\RelationManagers;

use App\Models\QrTienda;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Illuminate\Validation\Rule;

class QrTiendasRelationManager extends RelationManager
{
    protected static string $relationship = 'qrTiendas';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('tienda_id')
                    ->label('Tienda')
                    ->relationship('tienda', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->rule(function ($record, $livewire) {
                        return Rule::unique('qr_tiendas', 'tienda_id')
                            ->where('sorteo_id', $livewire->ownerRecord->id)
                            ->ignore($record?->id);
                    })
                    ->validationMessages([
                        'unique' => 'Ya existe esta tienda en este sorteo.',
                    ]),
                // TextInput::make('slug')
                //     ->label('Slug')
                //     // ->required()
                //     ->maxLength(255),

                // TextInput::make('url_qr')
                //     ->label('URL del QR')
                //     ->url()
                //     ->maxLength(255),
            ]);
    }
    public function table(Table $table): Table
    {
        return $table
            ->recordTitle(fn(QrTienda $record): string => $record->tienda->nombre)
            // ->recordTitleAttribute('')
            ->defaultSort('tienda.nombre', 'asc')
            ->columns([
                // TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('tienda.nombre')->label('Tienda')->sortable()->searchable(),
                // TextColumn::make('slug')->label('Slug')->copyable(),
                // TextColumn::make('codigo_qr')->label('Código QR')->copyable(),
                TextColumn::make('url_qr')->label('URL')->copyable(),
            ])
            ->headerActions([
                CreateAction::make()->label('Agregar Tienda'),
            ])
            ->recordActions([
                // EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar'),
            ]);
    }
}

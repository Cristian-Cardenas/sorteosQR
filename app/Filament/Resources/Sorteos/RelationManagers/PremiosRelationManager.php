<?php

namespace App\Filament\Resources\Sorteos\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PremiosRelationManager extends RelationManager
{
    protected static string $relationship = 'premios';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->rows(2),

                Forms\Components\TextInput::make('orden')
                    ->label('Orden')
                    ->rule(function ($record, $livewire) {
                        return \Illuminate\Validation\Rule::unique('premios', 'orden')
                            ->where('sorteo_id', $livewire->ownerRecord->id)
                            ->ignore($record?->id);
                    })
                    ->validationMessages([
                        'unique' => 'Ya existe un premio con ese número de orden en este sorteo.',
                    ])
                    ->required()
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                // TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('orden')->label('Orden')->sortable(),
                TextColumn::make('nombre')->label('Premio')->searchable()->sortable(),
                TextColumn::make('descripcion')->label('Descripción')->limit(40),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()->label('Agregar premio'),
                // AssociateAction::make()->label('Asociar'),
            ])
            ->recordActions([
                EditAction::make()->label('Editar'),
                // DissociateAction::make()->label('Desasociar'),
                DeleteAction::make()->label('Eliminar'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DissociateBulkAction::make()->label('Desasociar seleccionados'),
                    DeleteBulkAction::make()->label('Eliminar seleccionados'),
                ]),
            ]);
    }
}

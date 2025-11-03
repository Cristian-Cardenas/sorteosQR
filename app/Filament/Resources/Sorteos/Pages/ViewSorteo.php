<?php

namespace App\Filament\Resources\Sorteos\Pages;

use App\Filament\Resources\Sorteos\SorteoResource;
use App\Models\Premio;
use App\Models\Participante;
use App\Models\Ganador;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;
use Illuminate\Support\Facades\DB;

class ViewSorteo extends ViewRecord
{
    protected static string $resource = SorteoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),

            Actions\Action::make('generar_ganadores')
                ->label('🎯 Generar Ganadores')
                ->icon('heroicon-o-trophy')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Generar ganadores aleatorios')
                ->modalDescription('Se seleccionará un participante aleatorio por cada premio de este sorteo.')
                ->action(function ($record) {
                    DB::transaction(function () use ($record) {
                        $sorteo_id = $record->id;

                        $premios = Premio::where('sorteo_id', $sorteo_id)->get();
                        $participantes = Participante::where('sorteo_id', $sorteo_id)
                            ->inRandomOrder()
                            ->get();

                        if ($premios->isEmpty()) {
                            throw new \Exception('No hay premios registrados en este sorteo.');
                        }

                        if ($participantes->isEmpty()) {
                            throw new \Exception('No hay participantes en este sorteo.');
                        }

                        // Limpia ganadores anteriores (opcional)
                        Ganador::where('sorteo_id', $sorteo_id)->delete();

                        foreach ($premios as $premio) {
                            $ganador = $participantes->pop(); // extrae uno aleatorio
                            if (!$ganador)
                                break;

                            Ganador::create([
                                'sorteo_id' => $sorteo_id,
                                'premio_id' => $premio->id,
                                'participante_id' => $ganador->id,
                            ]);
                        }
                    });
                })
                ->successNotificationTitle('🎉 Ganadores generados correctamente'),
        ];
    }
}

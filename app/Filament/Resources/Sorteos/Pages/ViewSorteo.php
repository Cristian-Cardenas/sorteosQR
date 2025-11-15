<?php

namespace App\Filament\Resources\Sorteos\Pages;

use App\Filament\Resources\Sorteos\SorteoResource;
use App\Models\Premio;
use App\Models\Participante;
use App\Models\Ganador;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;
use Illuminate\Support\Facades\DB;
use App\Livewire\ParticipantesPorTiendaChart;
use App\Livewire\StatPorTiendaWidget;
use Filament\Notifications\Notification;
use Exception;
class ViewSorteo extends ViewRecord
{
    protected static string $resource = SorteoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),

            Actions\Action::make('generar_ganadores')
                ->label('Generar Ganadores')
                ->icon('heroicon-o-trophy')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Generar ganadores aleatorios')
                ->modalDescription('Se seleccionará un participante aleatorio por cada premio de este sorteo.')
                ->action(function ($record) {
                    try {
                        DB::transaction(function () use ($record) {
                            $sorteo_id = $record->id;

                            $premios = Premio::where('sorteo_id', $sorteo_id)->get();
                            $participantes = Participante::where('sorteo_id', $sorteo_id)
                                ->inRandomOrder()
                                ->get();

                            if ($premios->isEmpty()) {
                                Notification::make()
                                    ->title('¡Faltan Premios! 🎁')
                                    ->body('No puedes realizar el sorteo porque **no hay premios** registrados.')
                                    ->danger()
                                    ->persistent()
                                    ->send();
                                return;
                            }

                            if ($participantes->isEmpty()) {
                                Notification::make()
                                    ->title('¡Sin Participantes! 👥')
                                    ->body('El sorteo requiere participantes para poder ser ejecutado.')
                                    ->warning()
                                    ->send();
                                return;
                            }

                            Ganador::where('sorteo_id', $sorteo_id)->delete();

                            foreach ($premios as $premio) {
                                $ganador = $participantes->pop();
                                if (!$ganador)
                                    break;

                                Ganador::create([
                                    'sorteo_id' => $sorteo_id,
                                    'premio_id' => $premio->id,
                                    'participante_id' => $ganador->id,
                                ]);
                            }
                            Notification::make()
                                ->title('🎉 Ganadores generados correctamente')
                                ->body('Se han generado los ganadores del sorteo.')
                                ->success()
                                ->send();
                        });
                    } catch (Exception $e) {
                        Notification::make()
                            ->title('⚠️ Falló la ejecución del sorteo')
                            ->body('Ocurrió un error al generar los ganadores: ' . $e->getMessage())
                            ->danger()
                            ->send();

                        return;
                    }
                })
            // ->successNotificationTitle('🎉 Ganadores generados correctamente')
        ];
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            ParticipantesPorTiendaChart::make([
                'sorteoId' => $this->record->id,
            ]),
            StatPorTiendaWidget::make([
                'sorteoId' => $this->record->id,
            ]),
            
        ];
    }

}

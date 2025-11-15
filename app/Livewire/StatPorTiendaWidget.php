<?php

namespace App\Livewire;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Sorteo;
use App\Models\Participante;
use App\Models\Ganador;
use App\Models\Premio;

class StatPorTiendaWidget extends StatsOverviewWidget
{
    public ?int $sorteoId = null;

    protected static bool $isDiscovered = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Participantes', Participante::where('sorteo_id', $this->sorteoId)->count())
                ->description('Usuarios registrados en este sorteo')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),

            Stat::make('Ganadores', Ganador::where('sorteo_id', $this->sorteoId)->count())
                ->description('Total de ganadores en este sorteo')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('warning'),

            Stat::make('Premios', Premio::where('sorteo_id', $this->sorteoId)->count())
                ->description('Premios asignados a este sorteo')
                ->descriptionIcon('heroicon-m-cube')
                ->color('info'),
        ];
    }
}

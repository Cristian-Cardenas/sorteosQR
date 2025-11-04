<?php

namespace App\Livewire;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Sorteo;
use App\Models\Participante;
use App\Models\Ganador;
use App\Models\Premio;
use App\Models\Tienda;

class StatPorTiendaWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Sorteos totales', Sorteo::count())
                ->description('Número total de sorteos registrados')
                ->descriptionIcon('heroicon-m-gift')
                ->color('success'),

            Stat::make('Participantes', Participante::count())
                ->description('Usuarios registrados en los sorteos')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),

            Stat::make('Ganadores', Ganador::count())
                ->description('Total de ganadores generados')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('warning'),

            Stat::make('Premios', Premio::count())
                ->description('Premios disponibles en los sorteos')
                ->descriptionIcon('heroicon-m-cube')
                ->color('info'),

        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Sorteo;
use App\Models\Participante;
use App\Models\Ganador;
use App\Models\Premio;
use App\Models\Tienda;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Forms\Components\DatePicker;
class EstadisticasGlobalesWidget extends StatsOverviewWidget
{
    protected ?string $heading = 'Estadisticas Globales';
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

            Stat::make('Tiendas', Tienda::count())
                ->description('Tiendas participantes')
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color('gray'),
            Stat::make('Unique views', '192.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 55, 24, 87])
                ->color('success'),
        ];
    }
}

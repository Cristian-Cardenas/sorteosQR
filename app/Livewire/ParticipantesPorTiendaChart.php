<?php

namespace App\Livewire;

use App\Models\Tienda;
use Filament\Widgets\ChartWidget;

class ParticipantesPorTiendaChart extends ChartWidget
{
    public ?int $sorteoId = null;
    protected ?string $heading = 'Participantes por Tienda';
    // protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        if (!$this->sorteoId) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $data = Tienda::query()
            ->select('nombre')
            ->withCount([
                'participantes as total_participantes' => function ($query) {
                    $query->where('sorteo_id', $this->sorteoId);
                },
            ])
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Participantes',
                    'data' => $data->pluck('total_participantes')->toArray(),
                    // 'backgroundColor' => [
                    //     '#f47317ff',
                    //     '#eba156ff',
                    //     '#ff4800ff',
                    //     '#76b7b2',
                    //     '#59a14f',
                    //     '#edc948',
                    //     '#b07aa1',
                    //     '#ff9da7',
                    // ],
                ],
            ],
            'labels' => $data->pluck('nombre')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public function mount(): void
    {
        if (request()->route('record')) {
            $this->sorteoId = (int) request()->route('record');
        }
    }
}

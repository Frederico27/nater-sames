<?php

namespace App\Filament\Resources\FunsionariuResource\Widgets;

use App\Models\Grau;
use App\Models\Funsionariu;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class FunsionariuGrau extends ChartWidget
{
    protected static ?string $heading = 'Funsionariu Bazeia Grau';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Get count of funsionariu grouped by grau
        $data = Grau::select('grau.naran_grau')
            ->join('funsionariu', 'funsionariu.id_grau', '=', 'grau.id')
            ->select('grau.naran_grau', DB::raw('COUNT(funsionariu.id) as total'))
            ->groupBy('grau.id', 'grau.naran_grau')
            ->get();

        return [
            'datasets' => [
                [
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40',
                        '#8BC34A',
                        '#795548',
                        '#607D8B',
                        '#E91E63',
                    ],
                ],
            ],
            'labels' => $data->pluck('naran_grau')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
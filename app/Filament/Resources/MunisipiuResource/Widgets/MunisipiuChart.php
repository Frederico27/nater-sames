<?php

namespace App\Filament\Resources\MunisipiuResource\Widgets;

use App\Models\Munisipiu;
use App\Models\Funsionariu;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MunisipiuChart extends ChartWidget
{
    protected static ?string $heading = 'Funsionariu Bazeia Munisipiu';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        // Count funsionariu grouped by munisipiu
        $data = Munisipiu::select('munisipiu.id', 'munisipiu.naran_munisipiu')
            ->leftJoin('funsionariu', 'funsionariu.id_munisipiu', '=', 'munisipiu.id')
            ->select('munisipiu.naran_munisipiu', DB::raw('COUNT(funsionariu.id) as total_funsionariu'))
            ->groupBy('munisipiu.id', 'munisipiu.naran_munisipiu')
            ->get();
        
        return [
            'datasets' => [
                [
                    'label' => 'Funsionariu per Munisipiu',
                    'data' => $data->pluck('total_funsionariu')->toArray(),
                    'backgroundColor' => [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                        '#FF9F40', '#8AC926', '#1982C4', '#6A4C93', '#09731e'
                    ],
                ],
            ],
            'labels' => $data->pluck('naran_munisipiu')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'enabled' => true,
                ],
            ],
        ];
    }
}
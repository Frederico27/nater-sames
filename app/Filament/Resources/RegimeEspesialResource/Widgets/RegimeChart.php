<?php

namespace App\Filament\Resources\RegimeEspesialResource\Widgets;

use App\Models\Funsionariu;
use Filament\Widgets\ChartWidget;

class RegimeChart extends ChartWidget
{
    protected static ?string $heading = 'Funsionariu Bazeia ba Regime';
    protected static ?int $sort = 2;
    
    protected function getData(): array
    {
        // Count employees with regime
        $withRegime = Funsionariu::whereNotNull('id_regime')->count();
        
        // Count employees without regime
        $withoutRegime = Funsionariu::whereNull('id_regime')->count();
        
        return [
            'datasets' => [
                [
                    'label' => 'Funsionariu bazeia ba regime',
                    'data' => [$withRegime, $withoutRegime],
                    'backgroundColor' => ['#0f0b7d', '#ed0e0e'],
                ],
            ],
            'labels' => ['Regime Espesial', 'Regime Baibain'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    
}
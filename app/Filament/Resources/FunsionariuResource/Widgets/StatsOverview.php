<?php

namespace App\Filament\Resources\FunsionariuResource\Widgets;

use App\Models\Funsionariu;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $dadusFun =Funsionariu::count();

        return [
            Stat::make('Total Funsionariu', $dadusFun ),
            Stat::make('Funsionariu Ativu', Funsionariu::where('status', 'ativu')->count())
                ->color('success'),
            Stat::make('Funsionariu Inativu', Funsionariu::where('status', 'inativu')->count())
                ->color('danger'),
            Stat::make('Funsionariu Mane', Funsionariu::where('sexu', 'mane')->count()),
            Stat::make('Funsionariu Feto', Funsionariu::where('sexu', 'feto')->count()),
            
        ];
    }
}

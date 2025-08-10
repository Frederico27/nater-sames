<?php

namespace App\Filament\Resources\FunsionariuResource\Widgets;

use App\Models\Funsionariu;
use App\Filament\Resources\FunsionariuResource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $dadusFun = Funsionariu::count();

        return [
            Stat::make('Total Funsionariu', $dadusFun)
                ->url(FunsionariuResource::getUrl('index')),
            
            Stat::make('Funsionariu Ativu', Funsionariu::where('status', 'ativu')->count())
                ->color('success')
                ->url(FunsionariuResource::getUrl('index', [
                    'tableFilters[status][value]' => 'ativu',
                ])),
                
            Stat::make('Funsionariu Inativu', Funsionariu::where('status', 'inativu')->count())
                ->color('danger')
                ->url(FunsionariuResource::getUrl('index', [
                    'tableFilters[status][value]' => 'inativu',
                ])),
                
            Stat::make('Funsionariu Mane', Funsionariu::where('sexu', 'mane')->count())
                ->url(FunsionariuResource::getUrl('index', [
                    'tableFilters[sexu][value]' => 'mane',
                ])),
                
            Stat::make('Funsionariu Feto', Funsionariu::where('sexu', 'feto')->count())
                ->url(FunsionariuResource::getUrl('index', [
                    'tableFilters[sexu][value]' => 'feto',
                ])),
        ];
    }
}
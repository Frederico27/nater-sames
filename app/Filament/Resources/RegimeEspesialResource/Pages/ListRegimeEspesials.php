<?php

namespace App\Filament\Resources\RegimeEspesialResource\Pages;

use App\Filament\Resources\RegimeEspesialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegimeEspesials extends ListRecords
{
    protected static string $resource = RegimeEspesialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Kria Regime Espesial'),
        ];
    }
}

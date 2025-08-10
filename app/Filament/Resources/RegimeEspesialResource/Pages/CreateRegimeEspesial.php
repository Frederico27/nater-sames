<?php

namespace App\Filament\Resources\RegimeEspesialResource\Pages;

use App\Filament\Resources\RegimeEspesialResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRegimeEspesial extends CreateRecord
{
    protected static string $resource = RegimeEspesialResource::class;
    protected static ?string $title = 'Kria Regime Espesial';
}

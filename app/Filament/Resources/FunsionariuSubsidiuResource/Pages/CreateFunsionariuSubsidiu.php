<?php

namespace App\Filament\Resources\FunsionariuSubsidiuResource\Pages;

use App\Filament\Resources\FunsionariuSubsidiuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFunsionariuSubsidiu extends CreateRecord
{
    protected static string $resource = FunsionariuSubsidiuResource::class;
    protected static ?string $title = 'Kria Funsionariu Subsidiu';
}

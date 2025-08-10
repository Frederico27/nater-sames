<?php

namespace App\Filament\Resources\FunsionariuResource\Pages;

use App\Filament\Resources\FunsionariuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFunsionariu extends CreateRecord
{
    protected static string $resource = FunsionariuResource::class;
    protected static ?string $title = 'Kria Funsionariu';
}

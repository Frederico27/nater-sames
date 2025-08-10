<?php

namespace App\Filament\Resources\GrauResource\Pages;

use App\Filament\Resources\GrauResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGrau extends CreateRecord
{
    protected static string $resource = GrauResource::class;
    protected static ?string $title = 'Kria Grau';
}

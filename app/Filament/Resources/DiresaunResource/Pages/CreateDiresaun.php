<?php

namespace App\Filament\Resources\DiresaunResource\Pages;

use App\Filament\Resources\DiresaunResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDiresaun extends CreateRecord
{
    protected static string $resource = DiresaunResource::class;
       protected static ?string $title = 'Kria Diresaun';
}

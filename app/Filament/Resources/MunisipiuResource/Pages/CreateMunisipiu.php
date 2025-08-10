<?php

namespace App\Filament\Resources\MunisipiuResource\Pages;

use App\Filament\Resources\MunisipiuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMunisipiu extends CreateRecord
{
    protected static string $resource = MunisipiuResource::class;
    protected static ?string $title = 'Kria Munisipiu';
}

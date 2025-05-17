<?php

namespace App\Filament\Resources\GrauResource\Pages;

use App\Filament\Resources\GrauResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGraus extends ListRecords
{
    protected static string $resource = GrauResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

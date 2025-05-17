<?php

namespace App\Filament\Resources\SubsidiuResource\Pages;

use App\Filament\Resources\SubsidiuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubsidius extends ListRecords
{
    protected static string $resource = SubsidiuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

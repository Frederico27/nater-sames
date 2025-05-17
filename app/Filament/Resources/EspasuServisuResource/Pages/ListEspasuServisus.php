<?php

namespace App\Filament\Resources\EspasuServisuResource\Pages;

use App\Filament\Resources\EspasuServisuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEspasuServisus extends ListRecords
{
    protected static string $resource = EspasuServisuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\FunsionariuSubsidiuResource\Pages;

use App\Filament\Resources\FunsionariuSubsidiuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFunsionariuSubsidius extends ListRecords
{
    protected static string $resource = FunsionariuSubsidiuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Kria Funsionariu Subsidiu'),
        ];
    }
}

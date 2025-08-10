<?php

namespace App\Filament\Resources\FunsionariuResource\Pages;

use App\Filament\Resources\FunsionariuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFunsionarius extends ListRecords
{
    protected static string $resource = FunsionariuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Kria Funsionariu'),
        ];
    }
}

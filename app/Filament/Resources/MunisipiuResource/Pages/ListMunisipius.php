<?php

namespace App\Filament\Resources\MunisipiuResource\Pages;

use App\Filament\Resources\MunisipiuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMunisipius extends ListRecords
{
    protected static string $resource = MunisipiuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Kria Munisipiu'),
        ];
    }
}

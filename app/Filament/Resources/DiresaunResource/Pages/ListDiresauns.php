<?php

namespace App\Filament\Resources\DiresaunResource\Pages;

use App\Filament\Resources\DiresaunResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiresauns extends ListRecords
{
    protected static string $resource = DiresaunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

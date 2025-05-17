<?php

namespace App\Filament\Resources\DiresaunResource\Pages;

use App\Filament\Resources\DiresaunResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiresaun extends EditRecord
{
    protected static string $resource = DiresaunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

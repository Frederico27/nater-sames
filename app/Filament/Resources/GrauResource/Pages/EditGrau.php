<?php

namespace App\Filament\Resources\GrauResource\Pages;

use App\Filament\Resources\GrauResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrau extends EditRecord
{
    protected static string $resource = GrauResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

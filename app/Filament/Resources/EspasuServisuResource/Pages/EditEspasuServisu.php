<?php

namespace App\Filament\Resources\EspasuServisuResource\Pages;

use App\Filament\Resources\EspasuServisuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEspasuServisu extends EditRecord
{
    protected static string $resource = EspasuServisuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hamos'),
        ];
    }
}

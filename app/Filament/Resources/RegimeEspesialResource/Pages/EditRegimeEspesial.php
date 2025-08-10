<?php

namespace App\Filament\Resources\RegimeEspesialResource\Pages;

use App\Filament\Resources\RegimeEspesialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegimeEspesial extends EditRecord
{
    protected static string $resource = RegimeEspesialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hamos'),
        ];
    }
}

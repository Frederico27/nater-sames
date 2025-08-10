<?php

namespace App\Filament\Resources\SubsidiuResource\Pages;

use App\Filament\Resources\SubsidiuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubsidiu extends EditRecord
{
    protected static string $resource = SubsidiuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hamos'),
        ];
    }
}

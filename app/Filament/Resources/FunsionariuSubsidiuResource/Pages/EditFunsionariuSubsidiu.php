<?php

namespace App\Filament\Resources\FunsionariuSubsidiuResource\Pages;

use App\Filament\Resources\FunsionariuSubsidiuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFunsionariuSubsidiu extends EditRecord
{
    protected static string $resource = FunsionariuSubsidiuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\FunsionariuResource\Pages;

use App\Filament\Resources\FunsionariuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFunsionariu extends EditRecord
{
    protected static string $resource = FunsionariuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hamos'),
        ];
    }
}

<?php

namespace App\Filament\Resources\MunisipiuResource\Pages;

use App\Filament\Resources\MunisipiuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMunisipiu extends EditRecord
{
    protected static string $resource = MunisipiuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hamos'),
        ];
    }
}

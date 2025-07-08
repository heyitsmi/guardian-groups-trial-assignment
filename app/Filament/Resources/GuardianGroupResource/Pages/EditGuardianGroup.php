<?php

namespace App\Filament\Resources\GuardianGroupResource\Pages;

use App\Filament\Resources\GuardianGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuardianGroup extends EditRecord
{
    protected static string $resource = GuardianGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

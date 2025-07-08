<?php

namespace App\Filament\Resources\GuardianGroupResource\Pages;

use App\Filament\Resources\GuardianGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGuardianGroup extends ViewRecord
{
    protected static string $resource = GuardianGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

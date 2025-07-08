<?php

namespace App\Filament\Resources\GuardianGroupResource\Pages;

use App\Filament\Resources\GuardianGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuardianGroups extends ListRecords
{
    protected static string $resource = GuardianGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

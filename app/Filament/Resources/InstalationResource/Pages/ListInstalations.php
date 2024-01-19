<?php

namespace App\Filament\Resources\InstalationResource\Pages;

use App\Filament\Resources\InstalationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstalations extends ListRecords
{
    protected static string $resource = InstalationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

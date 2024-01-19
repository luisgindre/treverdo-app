<?php

namespace App\Filament\Resources\InstalationResource\Pages;

use App\Filament\Resources\InstalationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstalation extends EditRecord
{
    protected static string $resource = InstalationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

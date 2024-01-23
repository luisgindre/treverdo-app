<?php

namespace App\Filament\Resources\installationResource\Pages;

use App\Filament\Resources\installationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class Editinstallation extends EditRecord
{
    protected static string $resource = installationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

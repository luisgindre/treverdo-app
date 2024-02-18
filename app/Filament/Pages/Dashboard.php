<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
 
class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    protected static ?string $navigationLabel = 'Tablero de Control';
    protected static ?string $navigationGroup = 'Riego Solar';

    public function getColumns(): int | string | array
    {
        return 2;
    }

   
}
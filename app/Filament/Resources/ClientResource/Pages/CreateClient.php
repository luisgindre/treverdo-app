<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Get;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Closure;
class CreateClient extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = ClientResource::class;

    protected function getSteps(): array
    {
        return [
            Step::make('Verificar NIF / NIE')
                ->description('Ingrese un número de Nif/Nie.')
                ->schema([
                    TextInput::make('dni_nif_nie')
                        ->label('NIE')
                        ->required()
                        ->unique()
                        ->columnSpan(2)
                        ->validationAttribute('NIF / NIE')
                        ->rules([
                            fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                                $aux = $this->obtenerOpcionesDesdeAPI($value);
                                /* dd($aux); */
                                if ($aux) {
                                    $fail("Ya se encuentra Registrado el NIF / NIE Proporcionado.");
                                }
                            },
                        ]),
                ])->columns(6),
            Step::make('Datos Cliente')
                ->description('Cargar Datos')
                ->schema([
                    Split::make([
                        Section::make([
                            TextInput::make('dni_nif_nie')
                                ->label('NIF / NIE')
                                ->required()
                                ->unique()
                                ->columnSpan(6)
                               /*  ->readOnly()
                                ->disabled() */,
                            TextInput::make('company_name')
                                    ->hidden(fn (Get $get): bool => ! $get('is_company'))
                                    /* ->label('Empresa') */
                                    ->maxLength(255)
                                    ->required()
                                    ->columnSpan(6),
                            TextInput::make('last_name')
                                    ->visible(fn (Get $get): bool => ! $get('is_company'))
                                    ->label('Apellido')
                                    ->maxLength(255)
                                    ->required()
                                    ->columnSpan(3),
                            TextInput::make('name')
                                    ->visible(fn (Get $get): bool => ! $get('is_company'))
                                    ->label('Nombre')
                                    ->maxLength(255)
                                    ->required()
                                    ->columnSpan(3),
                            TextInput::make('phone')
                                    ->label('Teléfono')
                                    ->tel()
                                    ->maxLength(255)
                                    ->columnSpan(2),
                            TextInput::make('email')
                                    ->label('E-mail')
                                    ->email()
                                    ->maxLength(255)
                                    ->columnSpan(2),
                            TextInput::make('cell_phone')
                                    ->label('Cel')
                                    ->tel()
                                    ->maxLength(255)
                                    ->columnSpan(2),
                        ])->columns(6),
                        Section::make([
                            Toggle::make('is_company')
                                ->label('Es empresa')
                                ->onIcon('heroicon-o-building-office-2')
                                ->offIcon('heroicon-m-user')
                                ->live(),
                        ])->grow(false),
                    ])->from('md')
                ]),
        ];
    }

    protected static function obtenerOpcionesDesdeAPI($state)
    {
         // URL de la API de Dolibarr
        $dolibarrApiUrl = 'http://trevdevsp/api/index.php/thirdparties';

        // Credenciales de autenticación (ejemplo usando token de acceso)
        $accessToken = '94c30caeb8ad7e32c3c70f6fdb498e69ae088453';

        // Realizar la solicitud GET a la API de Dolibarr
        $response = Http::withHeaders([ 'DOLAPIKEY' =>  $accessToken, ])->get($dolibarrApiUrl);

        // Verificar si la solicitud fue exitosa (código 200)
        if ($response->successful()) {
            // Obtener los datos de la respuesta en formato JSON
            $data = $response->json();
        }

            // Formatea los datos según el formato requerido para las opciones del select
            $options = collect($data)->pluck('idprof1', 'id')->toArray();
            /* dd($options,$state); */
            foreach ($options as $value){
                if ($value == $state) {
                    return true;
                };
            };
        /* E78156049 */
        return false;
    }
}

<?php

namespace App\Filament\Resources\installationResource\Pages;

use App\Filament\Resources\installationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Createinstallation extends CreateRecord
{
    /* use CreateRecord\Concerns\HasWizard; */
    protected static string $resource = installationResource::class;

    protected function getSteps(): array
    {
        return [
            Step::make('Cliente')
                ->schema([
                    Section::make('Datos del cliente')
                    ->schema([
                        Select::make('client_id')
                            ->required()
                            ->label('Cliente')
                            ->relationship(
                                name: 'client',
                                modifyQueryUsing: fn (Builder $query) => $query->orderBy('name')->orderBy('last_name'),
                            )
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name} {$record->last_name}")
                            ->searchable(['name', 'last_name'])
                            ->preload()
                            ->columns(1),
                        TextInput::make('installation_location')
                            ->label('Localidad')
                            ->maxLength(255)
                            ->columns(1),
                        TextInput::make('installation_adress')
                            ->label('Domicilio')
                            ->maxLength(255),
                        TextInput::make('installation_total_area')
                            ->label('Área total')
                            ->numeric(),
                        TextInput::make('installation_total_irrigation_area')
                            ->numeric(),
                    ])->columns(2),
                ]),
            Step::make('Parcelas')  
                ->schema([    
                    Repeater::make('parcels')
                        ->label('Parcela')
                        ->relationship()
                        ->schema([
                            TextInput::make('cadastral_number')
                                ->prefixIcon('heroicon-m-information-circle')
                                ->label('Numero Catastral'),
                            Fieldset::make('Suelo')
                                ->schema([
                                TextInput::make('stoniness_percentage')
                                    ->prefixIcon('heroicon-m-information-circle')
                                    ->label('Pedregosidad'),
                                TextInput::make('useful_depth')
                                    ->label('Profundidad útil')
                                    ->suffix('m2')
                                    ->prefixIcon('heroicon-m-information-circle'),
                                ]),
                            Repeater::make('sectors')
                                ->label('Sectores')
                                ->relationship()
                                ->schema([
                                    Fieldset::make('Necesidades hídrcas del sistema')
                                        ->schema([
                                            TextInput::make('distance_between_drips')
                                                ->prefixIcon('heroicon-m-information-circle')
                                                ->suffix('m')
                                                ->label('Distancia entre goteros'),
                                            TextInput::make('branch_quantity_per_line')
                                                ->prefixIcon('heroicon-m-information-circle')
                                                ->suffix('nº')
                                                ->label('Número de ramales por línea'),
                                            TextInput::make('drip_flow')
                                                ->prefixIcon('heroicon-m-information-circle')
                                                ->suffix('x')
                                                ->label('Caudal por gotero'),
                                            TextInput::make('distance_between_lines')
                                                ->prefixIcon('heroicon-m-information-circle')
                                                ->suffix('m')
                                                ->label('Separación entre líneas'),
                                            
                                            Select::make('crop_id')
                                                ->label('Cultivos')
                                                ->relationship(name: 'crop', titleAttribute: 'name'),    
                                            Select::make('irrigation_id')
                                                ->label('Riegos')
                                                ->relationship(name: 'irrigation', titleAttribute: 'name'),  
                                        ])->columns(3),
                                        Fieldset::make('Sector')
                                        ->extraAttributes(['class' => 'flex'])
                                                ->schema([       
                                                    TextInput::make('irrigation_hours_per_day_jan')
                                                        ->label('Enero'),
                                                    TextInput::make('irrigation_hours_per_day_feb')
                                                        ->label('Febrero'),
                                                    TextInput::make('irrigation_hours_per_day_mar')
                                                        ->label('Marzo'),
                                                    TextInput::make('irrigation_hours_per_day_apr')
                                                        ->label('Abril'),
                                                    TextInput::make('irrigation_hours_per_day_may')
                                                        ->label('Mayo'),
                                                    TextInput::make('irrigation_hours_per_day_jun')
                                                        ->label('Junio'),
                                                    TextInput::make('irrigation_hours_per_day_jul')
                                                        ->label('Julio'),
                                                    TextInput::make('irrigation_hours_per_day_aug')
                                                        ->label('Agosto'),
                                                    TextInput::make('irrigation_hours_per_day_sep')
                                                        ->label('Septiembre'),
                                                    TextInput::make('irrigation_hours_per_day_oct')
                                                        ->label('Octubre'),
                                                    TextInput::make('irrigation_hours_per_day_nov')
                                                        ->label('Noviembre'),
                                                    TextInput::make('irrigation_hours_per_day_dic')
                                                        ->label('Diciembre'),
                                                ])->columns(12)
                                ])->columnSpan(3),      
                        ])->itemLabel(fn (array $state): ?string => 'Numero Catastral: '.$state['cadastral_number'] ?? 'Numero Catastral a designar ...'),
                    
            
                ]),
            ];
    }

   

}

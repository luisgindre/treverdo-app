<?php

namespace App\Filament\Resources;

use App\Filament\Resources\installationResource\Pages;
use App\Filament\Resources\installationResource\RelationManagers;
use App\Models\installation;
use App\Models\Irrigation;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;

class installationResource extends Resource
{
    protected static ?string $model = installation::class;

    protected static ?string $modelLabel = 'Instalación';

    protected static ?string $navigationLabel = 'Instalaciones';
    
    protected static ?string $pluralModelLabel = 'Instalaciones';

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Riego Solar';
    

    /* protected static ?string $navigationParentItem = 'Client'; */

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
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
                        Forms\Components\TextInput::make('installation_location')
                            ->label('Localidad')
                            ->maxLength(255)
                            ->columns(1),
                        Forms\Components\TextInput::make('installation_adress')
                            ->label('Domicilio')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('installation_total_area')
                            ->label('Área total')
                            ->numeric(),
                        Forms\Components\TextInput::make('installation_total_irrigation_area')
                            ->numeric(),
                    ])->columns(2),
                    Section::make('Parcelas y Terrenos')
                        ->schema([    
                            Repeater::make('parcels')
                            ->label('Parcela')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('cadastral_number')
                                    ->prefixIcon('heroicon-m-information-circle')
                                    ->label('Numero Catastral'),
                                    Forms\Components\TextInput::make('stoniness_percentage')
                                    ->prefixIcon('heroicon-m-information-circle')
                                    ->label('Pedregosidad'),
                                    Forms\Components\TextInput::make('useful_depth')
                                    ->label('Profundidad útil')
                                    ->suffix('m2')
                                    ->prefixIcon('heroicon-m-information-circle'),
                                Repeater::make('sectors')
                                    ->label('Terrenos')
                                    ->relationship()
                                    ->schema([
                                        Fieldset::make('Terreno')
                                            ->schema([
                                                Forms\Components\TextInput::make('distance_between_drips')
                                                    ->prefixIcon('heroicon-m-information-circle')
                                                    ->suffix('m')
                                                    ->label('Distancia entre goteo'),
                                                Forms\Components\TextInput::make('branch_quantity_per_line')
                                                    ->prefixIcon('heroicon-m-information-circle')
                                                    ->suffix('nº')
                                                    ->label('Número de ramales por línea'),
                                                Forms\Components\TextInput::make('drip_flow')
                                                    ->prefixIcon('heroicon-m-information-circle')
                                                    ->suffix('x')
                                                    ->label('drip_flow'),
                                                Forms\Components\TextInput::make('distance_between_lines')
                                                    ->prefixIcon('heroicon-m-information-circle')
                                                    ->suffix('m')
                                                    ->label('Distancia entre líneas'),
                                                Select::make('crop_id')
                                                    ->label('Cultivos')
                                                    ->relationship(name: 'crop', titleAttribute: 'name'),    
                                                Select::make('irrigation_id')
                                                    ->label('Riegos')
                                                    ->relationship(name: 'irrigation', titleAttribute: 'name'),  
                                                    
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_jan')
                                                    ->label('Enero'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_feb')
                                                    ->label('Febrero'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_mar')
                                                    ->label('Marzo'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_apr')
                                                    ->label('Abril'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_may')
                                                    ->label('Mayo'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_jun')
                                                    ->label('Junio'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_jul')
                                                    ->label('Julio'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_aug')
                                                    ->label('Agosto'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_sep')
                                                    ->label('Septiembre'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_oct')
                                                    ->label('Octubre'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_nov')
                                                    ->label('Noviembre'),
                                                Forms\Components\TextInput::make('irrigation_hours_per_day_dic')
                                                    ->label('Diciembre'),
                                            ])->columns(3),
                                           
                                    ])->columnSpan(3),      
                            ]),
                            
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.last_name')
                ->label('Apellido')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('client.name')
                ->label('Nombre ')
                ->searchable(),
                Tables\Columns\TextColumn::make('installation_location')
                    ->label('Locación')
                    ->searchable(),
                Tables\Columns\TextColumn::make('installation_adress')
                    ->label('Dirección')
                    ->searchable(),
                Tables\Columns\TextColumn::make('installation_total_area')
                    ->label('Área total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('installation_total_irrigation_area')
                    ->label('Área de riego total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            /* RelationManagers\ParcelsRelationManager::class, */
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\Listinstallations::route('/'),
            'create' => Pages\Createinstallation::route('/create'),
            'edit' => Pages\Editinstallation::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}

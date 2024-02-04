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
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Actions;
use Filament\Forms\Set;



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
                /* Actions::make([
                    Action::make('star')
                        ->icon('heroicon-m-star')
                        ->requiresConfirmation()
                        ->action(function (Set $set, $state) {
                            
                            $set('installation_adress', 'Pedro Goyena');
                        })
                ]), */
                Wizard::make([
                    Wizard\Step::make('Cliente')
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
                    Wizard\Step::make('Parcelas')
                       
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
                    ])->skippable(),


                
                    
                
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.fullName')
                ->label('Cliente ')
                ->placeholder('Sin dato')
                ->searchable(),
                Tables\Columns\TextColumn::make('installation_location')
                    ->label('Locación')
                    ->placeholder('Sin dato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('installation_adress')
                    ->label('Dirección')
                    ->placeholder('Sin dato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('installation_total_area')
                    ->label('Área total')
                    ->placeholder('Sin dato')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('installation_total_irrigation_area')
                    ->label('Área de riego total')
                    ->placeholder('Sin dato')
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

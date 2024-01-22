<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstalationResource\Pages;
use App\Filament\Resources\InstalationResource\RelationManagers;
use App\Models\Instalation;
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

class InstalationResource extends Resource
{
    protected static ?string $model = Instalation::class;

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
                        Forms\Components\TextInput::make('instalation_location')
                            ->label('Localidad')
                            ->maxLength(255)
                            ->columns(1),
                        Forms\Components\TextInput::make('instalation_adress')
                            ->label('Domicilio')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instalation_total_area')
                            ->label('Área total')
                            ->numeric(),
                        Forms\Components\TextInput::make('instalation_total_irrigation_area')
                            ->numeric(),
                    ])->columns(2),
                    Section::make('Parcelas')
                        ->schema([    
                            Repeater::make('parcels')
                            ->label('Parcelas')
                            ->relationship()
                            ->schema([
                                Fieldset::make('Datos del Suelo')
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
                                    ])->columns(3),
                                    Fieldset::make('Cultivo')
                                    ->schema([
                                        Select::make('crop_id')
                                            ->label('Cultivo')
                                            ->preload()
                                            ->multiple()
                                            ->relationship(name: 'crops', titleAttribute: 'name'),
                                        Select::make('irrigation_id')
                                            ->label('Riegos')
                                            ->preload()
                                            ->multiple()
                                            ->relationship(name: 'irrigations', titleAttribute: 'name'),
                                            Forms\Components\TextInput::make('distance_between_drips')
                                            ->label('Distancia entre goteros')
                                         
                                         
                                       
                                    ])->columns(2),    
                    ])
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
                Tables\Columns\TextColumn::make('instalation_location')
                    ->label('Locación')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instalation_adress')
                    ->label('Dirección')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instalation_total_area')
                    ->label('Área total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('instalation_total_irrigation_area')
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
            'index' => Pages\ListInstalations::route('/'),
            'create' => Pages\CreateInstalation::route('/create'),
            'edit' => Pages\EditInstalation::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}

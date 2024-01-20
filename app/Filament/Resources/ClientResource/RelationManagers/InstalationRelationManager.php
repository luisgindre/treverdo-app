<?php

namespace App\Filament\Resources\ClientResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;


class InstalationRelationManager extends RelationManager
{
    protected static string $relationship = 'instalations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detalles del cliente')
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
                    Section::make('Agregar Parcelas')
                        ->schema([    
                            Repeater::make('parcels')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('cadastral_number'),
                                Forms\Components\TextInput::make('stoniness_percentage'),
                                Forms\Components\TextInput::make('useful_depth'),
                                Forms\Components\TextInput::make('instalation_id'),
                            Select::make('crop_id')
                                ->required()
                                ->label('Cultivo')
                                ->relationship(
                                    name: 'crops',
                                    modifyQueryUsing: fn (Builder $query) => $query->orderBy('name')->orderBy('name'),
                                ),
                                

                    ])->columns(4)
                ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('client_id')
            ->columns([
                Tables\Columns\TextColumn::make('client.last_name')
                ->label('Apellido')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('client.name')
                ->label('Nombre ')
                ->searchable(),
                Tables\Columns\TextColumn::make('instalation_location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instalation_adress')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instalation_total_area')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('instalation_total_irrigation_area')
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

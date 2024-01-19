<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstalationResource\Pages;
use App\Filament\Resources\InstalationResource\RelationManagers;
use App\Models\Instalation;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class InstalationResource extends Resource
{
    protected static ?string $model = Instalation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
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
                    ->preload(),
                Forms\Components\TextInput::make('instalation_location')
                    ->label('Localidad')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instalation_adress')
                    ->label('Domicilio')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instalation_total_area')
                    ->label('Área total')
                    ->numeric(),
                Forms\Components\TextInput::make('instalation_total_irrigation_area')
                    ->numeric(),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
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
}

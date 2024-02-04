<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Fieldset;
use Filament\Actions\Action;
use Filament\Forms\Components\Actions;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    protected static ?string $navigationGroup = 'Administrar';
    
    protected static ?string $navigationLabel = 'Usuarios';

    protected static ?string $modelLabel = 'Usuario';
    
    protected static ?string $pluralModelLabel = 'Usuarios';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    
                    Section::make([
                        Fieldset::make('Datos Personales')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nombre')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('last_name')
                                    ->label('Apellido')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('cell_phone')
                                    ->label('Celular')
                                    ->maxLength(255),
                            ])->columns(2),
                        
                        Fieldset::make('Datos de la Empresa')
                            ->schema([
                                Select::make('company_id')
                                    ->label('Empresa')
                                    ->relationship(name: 'company', titleAttribute: 'name')
                                    ->searchable()
                                    ->preload(),
                                TextInput::make('company_position')
                                    ->label('Cargo'),
                                TextInput::make('work_phone')
                                    ->label('Telefono (Empresa)'),
                                TextInput::make('work_mail')
                                    ->label('Email (Empresa)'),
                            ])->columns(2),
                    ])->columns(2),
                    
                    Section::make([
                        Toggle::make('enabled')
                            ->label('Hablilitado'),
                        Select::make('role_id')
                            ->multiple()
                            ->relationship(name: 'roles', titleAttribute: 'name')
                            ->preload(), 
                        Select::make('module_id')
                            ->label('Módulo')
                                ->relationship(name: 'modules', titleAttribute: 'name')
                                ->preload(), 
                    ])->grow(false),
                ])->columnSpan(2),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullName')
                    ->label('Apellido y Nombre')
                    ->placeholder('Sin dato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cell_phone')
                    ->label('Celular')
                    ->placeholder('Sin dato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Empresa')
                    ->placeholder('Sin dato')
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('company_position')
                    ->label('Cargo')
                    ->placeholder('Sin dato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_phone')
                    ->label('Telefono (Empresa)')
                    ->placeholder('Sin dato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_mail')
                    ->label('Email (Empresa)')
                    ->placeholder('Sin dato')
                    ->searchable(),
                Tables\Columns\IconColumn::make('enabled')
                    ->label('Estado')
                    ->placeholder('Sin dato')
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.fullName')
                    ->label('Usuario Creador')
                    ->placeholder('Sin dato')
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_update_user_id')
                    ->label('Última Modificación')
                    ->placeholder('Sin dato')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha Creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha Actualización')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }


}

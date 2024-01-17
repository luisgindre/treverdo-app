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


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    protected static ?string $navigationGroup = 'Administrar';
    
    protected static ?string $navigationLabel = 'Usuarios';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Toggle::make('enabled')
                ->label('Hablilitado'),
                TextInput::make('last_name')
                    ->label('Apellido')
                    ->required()
                    ->maxLength(255),
                Select::make('company_id')
                    ->label('Empresa')
                    ->relationship(name: 'company', titleAttribute: 'name')
                    ->searchable()
                    ->preload(),
                Select::make('user_creator_id')
                ->label('Usuario Creador')
                ->relationship(
                    name: 'user',
                    modifyQueryUsing: fn (Builder $query) => $query->orderBy('name')->orderBy('last_name'),
                )
                ->getOptionLabelFromRecordUsing(fn (Model $user) => "{$user->last_name}, {$user->name}")
                ->searchable(['name', 'last_name']),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->label('Usuario Creador'),
                Tables\Columns\TextColumn::make('company_position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_mail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cell_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_update_user_id')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('enabled')
                    ->boolean(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

}

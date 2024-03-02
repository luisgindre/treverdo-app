<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\Fieldset;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Support\Enums\IconPosition;


class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Cliente';

    protected static ?string $navigationLabel = 'Clientes';
    
    protected static ?string $pluralModelLabel = 'Clientes';

    protected static ?string $navigationGroup = 'Riego Solar';

    public static function form(Form $form): Form
    {
        /* $options = self::obtenerOpcionesDesdeAPI(); */ // Accede al método estáticamente

        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('dni_nif_nie')
                            ->label('NIE')
                            ->required()
                            /* ->unique() */
                            ->columnSpan(6)
                           
                            ->disabled(),
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
                
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {$user = Auth::user(); if(!$user->roles()
                ->whereIn('name', ['Admin'])
                ->exists()){ return $query->where('user_creator_id','=',Auth::user()->id);}})
            ->columns([
                TextColumn::make('fullName')
                    ->label('Cliente')
                    ->placeholder('Sin dato')
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query
                            ->orderBy('last_name', $direction)
                            ->orderBy('name', $direction);
                    })
                    ->searchable(['name','last_name']),
                TextColumn::make('dni_nif_nie')
                    ->label('DNI - NIF - NIE')
                    ->icon('heroicon-o-identification')
                    ->iconPosition(IconPosition::Before)
                    ->iconColor('danger')
                    ->copyable()
                    ->copyMessage('Identificaión copiada')
                    ->copyMessageDuration(1500)
                    ->placeholder('Sin dato')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->icon('heroicon-m-envelope')
                    ->iconPosition(IconPosition::Before)
                    ->iconColor('primary')
                    ->copyable()
                    ->copyMessage('Email copiado')
                    ->copyMessageDuration(1500),
                    
                TextColumn::make('cell_phone')
                    ->label('Movil')
                    ->icon('heroicon-o-device-phone-mobile')
                    ->iconPosition(IconPosition::Before)
                    ->iconColor('#432')
                    ->copyable()
                    ->copyMessage('Teléfono copiado')
                    ->copyMessageDuration(1500)
                    ->placeholder('Sin dato'),
                TextColumn::make('phone')
                    ->label('Teléfono')
                    ->placeholder('Sin dato')
                    ->icon('heroicon-c-phone')
                    ->iconPosition(IconPosition::Before)
                    ->iconColor('gray')
                    ->copyable()
                    ->copyMessage('Teléfono copiado')
                    ->copyMessageDuration(1500),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
            ])
            ->defaultSort('fullName', 'asc')
            ->filters([
                
               /*  Filter::make('is_featured')
                    ->query(fn (Builder $query) => $query->where('is_featured', true)),
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ]), */
               
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
            RelationManagers\installationRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    
}

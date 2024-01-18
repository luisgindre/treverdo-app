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

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $options = self::obtenerOpcionesDesdeAPI(); // Accede al método estáticamente

        return $form
            ->schema([
                Select::make('dolibarr_thirdparty_id')
                ->searchable()
                ->getSearchResultsUsing(fn (string $search): array => $options )
                ->getOptionLabelUsing(fn ($value): ?string => in_array($value,$options)),
                Forms\Components\TextInput::make('dni_cif_nie')
                    ->maxLength(12),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cell_phone')
                    ->tel()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dolibarr_thirdparty_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dni_cif_nie')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cell_phone')
                    ->searchable(),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    protected static function obtenerOpcionesDesdeAPI()
    {
         // URL de la API de Dolibarr
    $dolibarrApiUrl = 'http://trevdevsp/api/index.php/thirdparties';

    // Credenciales de autenticación (ejemplo usando token de acceso)
    $accessToken = '94c30caeb8ad7e32c3c70f6fdb498e69ae088453';

    // Realizar la solicitud GET a la API de Dolibarr
    $response = Http::withHeaders([
        'DOLAPIKEY' =>  $accessToken,
    ])->get($dolibarrApiUrl);

    // Verificar si la solicitud fue exitosa (código 200)
    if ($response->successful()) {
        // Obtener los datos de la respuesta en formato JSON
        $data = $response->json();
    }

        // Formatea los datos según el formato requerido para las opciones del select
        $options = collect($data)->pluck('name_alias', 'id')->toArray();
      
       
        return $options;
    }
}

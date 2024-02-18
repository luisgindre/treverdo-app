<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        $data['user_id'] = auth()->id();
        $data['password'] = Hash::make('12345678');
     
        return $data;
    }
    

    protected function handleRecordCreation(array $data): Model
    {
        $user = static::getModel()::create($data);
        event(new Registered($user));
        return $user; 
    }
    
}

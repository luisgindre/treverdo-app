<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_creator_id',
        'last_update_user_id',
        'module_id',
        'dolibarr_thirdparty_id',
        'dni_nif_nie',
        'is_company',
        'company_name',
        'name',
        'last_name',
        'phone',
        'email',
        'cell_phone',
        'created_at',
        'updated_at',
        
    ];

    public function installations(): HasMany
    {
        return $this->hasMany(installation::class);
    }

    public function getFullNameAttribute()
    {
        return $this->last_name . ', ' . $this->name ;
    }
}

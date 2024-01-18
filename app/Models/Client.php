<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'dolibarr_thirdparty_id',
        'dni_cif_nie',
        'name',
        'last_name',
        'phone',
        'email',
        'cell_phone',
        'created_at',
        'updated_at',
        
    ];
}

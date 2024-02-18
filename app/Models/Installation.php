<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class installation extends Model
{
    use HasFactory;

    protected $guarded = [];

   

    public function client(): BelongsTo
    {
        return $this->belongsTo(client::class);
    }

    public function parcels(): HasMany
    {
        return $this->hasMany(Parcel::class);
    }

   

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Parcel extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function soil(): HasOne
    {
        return $this->hasOne(soil::class);
    }

    public function instalation(): BelongsTo
    {
        return $this->belongsTo(Instalation::class);
    }

    public function irrigation() {
        return $this->hasOne(irrigation::class);
    }

    public function crops(): BelongsToMany
    {
        return $this->belongsToMany(Crop::class,'crop_irrigation_parcel');
    }
    
    public function irrigations(): BelongsToMany
    {
        return $this->belongsToMany(Irrigation::class,'crop_irrigation_parcel');
    }
  
}

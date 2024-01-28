<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Parcel extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function soil(): HasOne
    {
        return $this->hasOne(soil::class);
    }

    public function installation(): BelongsTo
    {
        return $this->belongsTo(installation::class);
    }
   
   
    public function sectors(): HasMany
    {
        return $this->hasMany(sector::class);
    }

   /*  public function irrigation() {
        return $this->hasOne(irrigation::class);
    } */

    
    
    public function irrigations(): BelongsToMany
    {
        return $this->belongsToMany(Irrigation::class,'crop_irrigation_parcel')->withPivot(['distance_between_drips','branch_quantity_per_line','drip_flow','distance_between_lines','irrigation_hours_per_day_jan','irrigation_hours_per_day_feb','irrigation_hours_per_day_mar','irrigation_hours_per_day_apr','irrigation_hours_per_day_may','irrigation_hours_per_day_jun','irrigation_hours_per_day_jul','irrigation_hours_per_day_aug','irrigation_hours_per_day_sep','irrigation_hours_per_day_oct','irrigation_hours_per_day_nov','irrigation_hours_per_day_dic']);
    }
    

  
}

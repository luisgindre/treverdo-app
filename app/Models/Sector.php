<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sector extends Model
{
    use HasFactory;

    public $guarded = [];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function crop(): BelongsTo
    {
        return $this->belongsTo(Crop::class);
    }
    
    
    public function irrigation(): BelongsTo
    {
        return $this->belongsTo(Irrigation::class);
    }
}

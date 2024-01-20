<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Soil extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parcel(): BelongsTo
    {
        return $this->belongsTo(Parcel::class);
    }
}

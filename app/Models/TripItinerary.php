<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripItinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'title',
        'description',
        'time_label',
        'sort_order',
    ];

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}

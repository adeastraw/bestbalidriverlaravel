<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'capacity',
        'luggage_capacity',
        'description',
        'facilities',
        'photo',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'capacity' => 'integer',
        'luggage_capacity' => 'integer',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            if (empty($vehicle->slug)) {
                $vehicle->slug = Str::slug($vehicle->name);
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(VehicleImage::class)->orderBy('sort_order', 'asc');
    }

    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trip::class, 'trip_vehicle');
    }

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo) {
            if (str_starts_with($this->photo, 'http://') || str_starts_with($this->photo, 'https://')) {
                return $this->photo;
            }
            return asset('storage/' . $this->photo);
        }
        return 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=800&q=80';
    }

    public function getFacilitiesListAttribute(): array
    {
        if (empty($this->facilities)) {
            return ['Air Conditioning', 'Clean & Comfortable Seats', 'Spacious Legroom'];
        }
        return array_filter(array_map('trim', explode("\n", str_replace(["\r\n", "\r", ","], "\n", $this->facilities))));
    }
}

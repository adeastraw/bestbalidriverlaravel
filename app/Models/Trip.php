<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'location',
        'duration',
        'price',
        'price_label',
        'short_description',
        'description',
        'hero_image',
        'status',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($trip) {
            if (empty($trip->slug)) {
                $trip->slug = Str::slug($trip->name);
            }
        });
    }

    public function destinations(): HasMany
    {
        return $this->hasMany(TripDestination::class)->orderBy('sort_order', 'asc');
    }

    public function itineraries(): HasMany
    {
        return $this->hasMany(TripItinerary::class)->orderBy('sort_order', 'asc');
    }

    public function inclusions(): HasMany
    {
        return $this->hasMany(TripInclusion::class)->orderBy('sort_order', 'asc');
    }

    public function includedItems(): HasMany
    {
        return $this->hasMany(TripInclusion::class)->where('type', 'included')->orderBy('sort_order', 'asc');
    }

    public function notIncludedItems(): HasMany
    {
        return $this->hasMany(TripInclusion::class)->where('type', 'not_included')->orderBy('sort_order', 'asc');
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_trip');
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'trip_vehicle');
    }

    public function drivers(): BelongsToMany
    {
        return $this->belongsToMany(Driver::class, 'driver_trip');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getHeroImageUrlAttribute(): string
    {
        if ($this->hero_image) {
            if (str_starts_with($this->hero_image, 'http://') || str_starts_with($this->hero_image, 'https://')) {
                return $this->hero_image;
            }
            return asset('storage/' . $this->hero_image);
        }
        return 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1200&q=80';
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->price) {
            return 'IDR ' . number_format($this->price, 0, ',', '.');
        }
        return 'Contact Us';
    }
}

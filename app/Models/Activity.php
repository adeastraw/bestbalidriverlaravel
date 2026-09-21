<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'location',
        'duration',
        'price',
        'price_label',
        'short_description',
        'description',
        'image',
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

        static::creating(function ($activity) {
            if (empty($activity->slug)) {
                $activity->slug = Str::slug($activity->name);
            }
        });
    }

    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trip::class, 'activity_trip');
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }
            return asset('storage/' . $this->image);
        }
        return 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=800&q=80';
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->price) {
            return 'IDR ' . number_format($this->price, 0, ',', '.');
        }
        return 'Contact Us';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Room extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'image_path',
        'stars',
        'quality_label',
        'price_per_night',
        'status',
    ];


    protected $casts = [
        'price_per_night' => 'decimal:2',
        'stars' => 'integer',
    ];

    public function getDisplayTitleAttribute()
    {
        return $this->title ?: $this->name;
    }

    public function getImageUrlAttribute()
    {
        if (! $this->image_path) {
            return asset('images/room1.jpg');
        }

        // Full URL already stored
        if (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }

        // Common already-prefixed public paths
        if (Str::startsWith($this->image_path, ['images/', 'img/', 'assets/'])) {
            return asset($this->image_path);
        }

        // If it's a storage path (either fully prefixed or just the relative storage path)
        if (Str::startsWith($this->image_path, ['storage/'])) {
            return asset($this->image_path);
        }

        // Filename-only: assume public/images/{filename}
        return asset('images/'.$this->image_path);
    }

}


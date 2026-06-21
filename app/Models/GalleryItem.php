<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'sort_order',
        'status',
    ];


    protected $casts = [
        'sort_order' => 'integer',
    ];
}


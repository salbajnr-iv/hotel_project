<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'arrival',
        'departure',
        'full_name',
        'email',
        'phone',
        'notes',
        'status',
    ];

    protected $casts = [
        'room_id' => 'integer',
        'arrival' => 'date',
        'departure' => 'date',
    ];
}



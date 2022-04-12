<?php

namespace App\Models;

use Eloquent as Model;

class Buse extends Model
{

    public $table = 'buse';

    public $fillable = [
        'id',
        'route_id',
        'driver_id',
        'coach_id',
        'start_day',
        'start_time',
        'is_active',
        'price'
    ];

    public static $rules = [];
    public function lotrinh()
    {
        return $this->belongsTo(\App\Models\RouteBus::class, 'route_id', 'id');
    }
    public function taixe()
    {
        return $this->belongsTo(\App\Models\Users::class, 'driver_id', 'id');
    }
    public function xe()
    {
        return $this->belongsTo(\App\Models\Coach::class, 'coach_id', 'id');
    }
}

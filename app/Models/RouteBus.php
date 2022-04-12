<?php

namespace App\Models;

use Eloquent as Model;

class RouteBus extends Model
{

    public $table = 'route_bus';

    public $fillable = [
        'id',
        'departure',
        'destination',
        'rest_stops',
        'time_intend',
        'user_update',
        'image',
        'route',
        'user_create'
    ];

    public static $rules = [];
    public function bus_stop()
    {
        return $this->belongsTo(\App\Models\BusStop::class, 'rest_stops', 'id');
    }
    public function diemxuatphat()
    {
        return $this->belongsTo(\App\Models\Province::class, 'departure', 'id');
    }
    public function diemketthuc()
    {
        return $this->belongsTo(\App\Models\Province::class, 'destination', 'id');
    }
}

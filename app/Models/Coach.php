<?php

namespace App\Models;

use Eloquent as Model;

class Coach extends Model
{

    public $table = 'coach';

    public $fillable = [
        'id',
        'license_plate',
        'type_car_id',
        'is_active',
        'ngaybaotrigannhat',
        'ngaybaotritieptheo',
        'location'
    ];

    public static $rules = [
        'license_plate' => 'required'
    ];
    public function loaixe()
    {
        return $this->belongsTo(\App\Models\TypeBuses::class, 'type_car_id', 'id');
    }
}

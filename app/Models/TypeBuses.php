<?php

namespace App\Models;

use Eloquent as Model;

class TypeBuses extends Model
{

    public $table = 'type_buses';

    public $fillable = [
        'id',
        'type_bus',
        'type_seat',
        'seats',
        'number_row',
        'number_columns',
        'diagram',
        'user_create',
        'user_update',
    ];

    public static $rules = [
        'type_bus' => 'required'
    ];
}

<?php

namespace App\Models;

use Eloquent as Model;

class BusStop extends Model
{

    public $table = 'bus_stop';

    public $fillable = [
        'id',
        'name',
        'position',
        'user_create',
        'user_update',
    ];

    public static $rules = [
        'name' => 'required'
    ];
}

<?php

namespace App\Models;

use Eloquent as Model;

class Setting extends Model
{
    public $table = 'settings';

    public $fillable = [
        'id',
        'company',
        'address',
        'address2',
        'image',
        'phone',
        'hotline',
        'tax',
        'facebook',
        'email',
        'introduce',
        'summary',
    ];

    protected $casts = [
    ];

    public static $rules = [];
}
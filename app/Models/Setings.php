<?php

namespace App\Models;

use Eloquent as Model;

class Setings extends Model
{
    public $table = 'ad_setings';

    public $fillable = [
        'id',
        'key',
        'value',
        'parent_id',
        'is_active'
    ];

    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'value' => 'string',
        'parent_id' => 'integer',
        'is_active' => 'integer'
    ];

    public static $rules = [];
    public function settings()
    {
        return $this->belongsTo(\App\Models\Setings::class, 'parent_id', 'id');
    }
}
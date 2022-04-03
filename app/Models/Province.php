<?php

namespace App\Models;

use App\Traits\FillterTraits;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $table = 'province';

    use FillterTraits;

    public $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public static $rules = [];
}

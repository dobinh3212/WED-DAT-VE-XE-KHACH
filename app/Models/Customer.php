<?php

namespace App\Models;

use Eloquent as Model;
use App\Traits\FillterTraits;
use Carbon\Carbon;

class Customer extends Model
{

    public $table = 'customer';
    use FillterTraits;

    public $fillable = [
        'id',
        'name',
        'date_birth',
        'sex',
        'address',
        'password',
        'email',
        'phone',
    ];

    public static $rules = [
        'name' => 'required',
    ];
}

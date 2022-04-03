<?php

namespace App\Models;

use Eloquent as Model;
use App\Traits\FillterTraits;
use Carbon\Carbon;

class Users extends Model
{

    public $table = 'users';
    use FillterTraits;

    public $fillable = [
        'name',
        'date_birth',
        'sex',
        'address',
        'password',
        'email',
        'type_employee',
        'branch',
        'phone',
        'license',
        'start_day'
    ];

    public static $rules = [
        'name' => 'required',
    ];
}

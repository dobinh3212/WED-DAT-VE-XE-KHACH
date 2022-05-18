<?php

namespace App\Models;

use Eloquent as Model;
use App\Traits\FillterTraits;
use Carbon\Carbon;

class Customer extends Model
{

    public $table = 'customers';
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
        'user_edit_id',
    ];

    public static $rules = [
        'name' => 'required',
    ];
    public function user_edit()
    {
        return $this->belongsTo(\App\Models\Users::class, 'user_edit_id', 'id');
    }
}

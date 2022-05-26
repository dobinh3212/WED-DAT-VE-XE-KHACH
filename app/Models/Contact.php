<?php

namespace App\Models;

use Eloquent as Model;

class Contact extends Model
{

    public $table = 'contact';

    public $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'title',
        'content',
        'date_submit',
        'is_checked',
        'updated_at',
        'created_at'
    ];
}

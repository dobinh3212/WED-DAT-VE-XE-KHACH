<?php

namespace App\Models;

use Eloquent as Model;

class News extends Model
{

    public $table = 'news';

    public $fillable = [
        'id',
        'title',
        'image',
        'introduce',
        'content',
        'check_slide',
        'id_admin_created',
        'id_admin_changed',
        'is_disabled',
    ];

    public static $rules = [
      
    ];
}

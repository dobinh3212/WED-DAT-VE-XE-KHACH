<?php

namespace App\Models;

use Eloquent as Model;

class OrderTicket extends Model
{
    public $table = 'order_ticket';

    public $fillable = [
        'id',
        'user_edit_id',
        'customer_id',
        'buse_id',
        'number',
        'is_active',
        'total',
        'payment',
    ];

    public static $rules = [];
}

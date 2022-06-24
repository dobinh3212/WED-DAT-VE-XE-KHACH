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
    public function buse()
    {
        return $this->belongsTo(\App\Models\Buse::class, 'buse_id', 'id');
    }
    public function route_id()
    {
        return $this->belongsTo(\App\Models\Buse::class, 'buse_id', 'id');
    }
    public function user_edit()
    {
        return $this->belongsTo(\App\Models\Users::class, 'user_edit_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id', 'id');
    }
}

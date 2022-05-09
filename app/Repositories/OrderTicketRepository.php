<?php

namespace App\Repositories;

use App\Models\OrderTicket;
use App\Repositories\BaseRepository;

class OrderTicketRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'user_edit_id',
        'customer_id',
        'buse_id',
        'number',
        'is_active',
        'total',
        'payment',
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return OrderTicket::class;
    }
}

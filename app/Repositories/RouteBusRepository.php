<?php

namespace App\Repositories;

use App\Models\RouteBus;
use App\Repositories\BaseRepository;

class RouteBusRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'departure',
        'destination',
        'rest_stops',
        'time_intend',
        'user_update',
        'user_create'
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return RouteBus::class;
    }
}
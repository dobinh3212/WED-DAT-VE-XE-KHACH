<?php

namespace App\Repositories;

use App\Models\Buse;
use App\Repositories\BaseRepository;

class BuseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'route_id',
        'driver_id',
        'coach_id',
        'start_day',
        'start_time',
        'is_active',
        'price'
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return Buse::class;
    }
}
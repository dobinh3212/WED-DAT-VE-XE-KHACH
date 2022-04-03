<?php

namespace App\Repositories;

use App\Models\BusStop;
use App\Repositories\BaseRepository;

class BusStopRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'name',
        'position',
        'user_id_create',
        'user_id_update',
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return BusStop::class;
    }
}
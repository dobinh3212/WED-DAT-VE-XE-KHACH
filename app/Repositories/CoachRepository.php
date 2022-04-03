<?php

namespace App\Repositories;

use App\Models\Coach;
use App\Repositories\BaseRepository;

class CoachRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'license_plate',
        'type_car_id',
        'is_active',
        'ngaybaotrigannhat',
        'ngaybaotritieptheo',
        'location'
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return Coach::class;
    }
}
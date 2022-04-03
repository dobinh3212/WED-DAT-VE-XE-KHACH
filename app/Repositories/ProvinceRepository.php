<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\BaseRepository;

class ProvinceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return Province::class;
    }
}
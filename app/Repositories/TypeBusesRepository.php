<?php

namespace App\Repositories;

use App\Models\TypeBuses;
use App\Repositories\BaseRepository;

class TypeBusesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'type_bus',
        'type_seat',
        'seats',
        'number_row',
        'number_columns',
        'diagram',
        'nhanvientao',
        'nhanviensua',
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return TypeBuses::class;
    }
}
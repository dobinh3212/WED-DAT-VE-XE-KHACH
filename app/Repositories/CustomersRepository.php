<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Users;
use App\Repositories\BaseRepository;


class CustomersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'date_birth',
        'sex',
        'address',
        'password',
        'email',
        'phone',
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }
    public function model()
    {
        return Customer::class;
    }
}

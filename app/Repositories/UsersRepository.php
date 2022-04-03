<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;


class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'date_birth',
        'sex',
        'address',
        'password',
        'email',
        'type_employee',
        'branch',
        'phone',
        'license',
        'start_day'
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }
    public function model()
    {
        return Users::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\BaseRepository;

class NewsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'title',
        'image',
        'introduce',
        'content',
        'check_slide',
        'id_admin_created',
        'id_admin_changed',
        'is_disabled',
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return News::class;
    }
}
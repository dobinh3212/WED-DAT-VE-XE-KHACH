<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
    }

    public function messages()
    {
        return[
            'title.required' => 'Tiêu đề không được để trống',
        ];
    }
}

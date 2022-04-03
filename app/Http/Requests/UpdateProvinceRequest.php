<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProvinceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id',
            'name',
            'created_at',
            'updated_at',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Tên tỉnh thành không được để trống',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBuseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id',
            'route_id',
            'driver_id',
            'coach_id',
            'start_day',
            'start_time',
            'is_active',
            'price'
            ];
    }

    public function messages()
    {
        return[
            // 'tenloai.required' => 'Tên loại xe không được để trống',
        ];
    }
}

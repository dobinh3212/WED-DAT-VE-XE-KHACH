<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeBuseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
    }

    public function messages()
    {
        return[
            'type_bus.required' => 'Tên loại xe không được để trống',
        ];
    }
}

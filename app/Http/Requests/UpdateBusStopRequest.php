<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusStopRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Tên điểm dừng không được để trống',
        ];
    }
}

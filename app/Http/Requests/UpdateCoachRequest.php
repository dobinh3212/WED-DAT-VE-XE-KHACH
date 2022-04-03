<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoachRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'license_plate' => 'required',
            'type_car_id' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'license_plate.required' => 'Biển số xe không được để trống',
            'type_car_id.required' => 'Loại xe không được để trống'
        ];
    }
}

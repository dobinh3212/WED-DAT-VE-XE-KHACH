<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được để trống',
            'email.required' => 'Email không được để trống',
        ];
    }
}

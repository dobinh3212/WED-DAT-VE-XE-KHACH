<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password_old' => 'required',
            'password_new' => 'required',
            'password_new_confirm' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'password_old.required' => 'Mật khẩu cũ không được để trống',
            'password_new.required' => 'Mật khẩu mới không được để trống',
            'password_new_confirm.required' => 'Xác nhận mật khẩu mới không được để trống',
        ];
    }
}
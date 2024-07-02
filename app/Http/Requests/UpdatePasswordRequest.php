<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|password',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'وارد کردن کلمه عبور فعلی الزامی است',
            'old_password.password' => 'کلمه عبور شما اشتباه است',
            'password.required' => 'وارد کردن کلمه عبور جدید الزامی است',
            'password.min' => 'کلمه عبور جدید باید بیشتر از ۶ کارکتر باشد',
            'password.confirmed' => 'وارد کردن تایید کلمه عبور جدید الزامی است',
            'password_confirmation.required' => 'وارد کردن تایید کلمه عبور جدید الزامی است',
        ];
    }
}

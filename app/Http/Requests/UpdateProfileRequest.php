<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email:rfc,dns,spoof', Rule::unique('users')->ignore(auth()->id())],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام الزامی است',
            'email.required' => 'وارد کردن ایمیل الزامی است',
            'email.email' => 'ایمیل وارد شده معتبر نمیباشد',
            'email.unique' => 'ایمیل وارد شده متعلق به شخص دیگری میباشد',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'type' => 'required|in:sms,email',
            'title' => 'required_if:type,email',
            'sms_pattern' => 'required_if:type,sms',
            'message' => 'required',
            'image' => 'nullable'
        ];

        if ($this->type == 'email')
            $rules = array_merge($rules,['user_key' => 'required|email']);
        else
            $rules = array_merge($rules,['user_key' => 'required|numeric|digits:11']);

        return $rules;
    }


    public function messages()
    {
        return [
            'type.required' => 'نوع پیام را مشخص کنید',
            'message.required' => 'کامل کردن متن پیام ضروری است',
            'title.required_if' => 'کامل کردن تیتر در هنگام ارسال ایمیل الزامی است',
            'sms_pattern.required_if' => 'کامل کردن رابط کاربری پیامک در هنگام ارسال پیامک الزامی است',
            'user_key.required' => 'کامل کردن اطلاعات گیرنده الزامی است',
            'user_key.email' => 'ایمیل وارد شده نامعتبر میباشد',
            'user_key.numeric' => 'شماره تلفن وارد شده باید فرمت 09335553344 باشد',
            'user_key.digits' => 'شماره تلفن باید ۱۱ رقمی باشد'
        ];
    }
}

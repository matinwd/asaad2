<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SlideRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'name' => ['required'],
            'image' => ['required','url'],
            'url' => ['nullable','url'],
            'type' => ['required','in:img,video'],
            'active' => ['required','in:1,0'],
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $rules[$index . '.title'] = 'required|string';
            $rules[$index . '.details'] = 'required|string';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'وارد کردن نام الزامی است',
            'image.required' => 'انتخاب فایل الزامی است',
            'image.url' => 'فایل انتخابی شما نامعتبر است',
            'url.url' => 'پیوند نامعتبر است',
            'type.required' => 'تعیین نوع الزامی است',
            'type.in' => 'انتخاب نامعتبر !!',
            'active.required' => 'تعیین وضعیت نمایش الزامی است',
            'active.in' => 'انتخاب نامعتبر !!',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $messages[$index . '.title.' . 'required'] = 'وارد کردن عنوان الزامی است';
            $messages[$index . '.title.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.details.' . 'required'] = 'وارد کردن متن الزامی است';
            $messages[$index . '.details.' . 'string'] = 'لطفا فقط متن وارد کنید';
        }
        return $messages;
    }
}

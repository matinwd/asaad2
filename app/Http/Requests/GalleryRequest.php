<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GalleryRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'slug' => ['required','alpha_dash',$this->isMethod('patch') ? Rule::unique('galleries')->ignore($this->id) : 'unique:galleries'],
            'image' => ['required','url'],
            'date' => ['required','date'],
            'active' => ['required','in:1,0'],
            'pictures' => 'nullable|array',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $rules[$index . '.title'] = 'required|string';
            $rules[$index . '.text'] = 'required|string';
            $rules[$index . '.tags'] = 'required|string';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'slug.required' => 'وارد کردن Slug الزامی است',
            'slug.alpha_dash' => 'فقط حروف الفبا/اعداد/کارکتر - و کارکتر _ مجاز است',
            'slug.unique' => 'این Slug قبلا ثبت شده است',
            'date.required' => 'وارد کردن تاریخ الزامی است',
            'date.date' => 'لطفا تاریخ مناسبی انتخاب کنید',
            'image.required' => 'انتخاب تصویر اصلی الزامی است',
            'image.url' => 'تصویر انتخاب شده معتبر نیست',
            'active.required' => 'تعیین وضعیت نمایش الزامی است',
            'active.in' => 'مورد انتخاب شده نامعتبر است',
            'pictures.array' => 'داده های ورودی نامعتبر است',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $messages[$index . '.title.' . 'required'] = 'وارد کردن عنوان الزامی است';
            $messages[$index . '.title.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.text.' . 'required'] = 'وارد کردن متن الزامی است';
            $messages[$index . '.text.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.tags.' . 'required'] = 'وارد کردن برچسب ها الزامی است';
            $messages[$index . '.tags.' . 'string'] = 'لطفا فقط متن وارد کنید';
        }
        return $messages;
    }
}

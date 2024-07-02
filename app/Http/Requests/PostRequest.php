<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'slug' => ['required','alpha_dash',$this->isMethod('patch') ? Rule::unique('articles')->ignore($this->id) : 'unique:articles'],
            'category_id' => ['required','numeric','exists:categories,id'],
            'date' => ['required','date'],
            'status' => ['required','in:draft,publish'],
            'pictures' => 'nullable|array',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $rules[$index . '.title'] = 'required|string|max:250';
            $rules[$index . '.details'] = 'required|string|max:500';
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
            'category_id.required' => 'وارد کردن دسته بندی الزامی است',
            'category_id.numeric' => 'دسته بندی مورد نظر نامعتبر است',
            'category_id.exists' => 'دسته بندی مورد نظر نامعتبر است',
            'category_id.exists' => 'دسته بندی مورد نظر نامعتبر است',
            'date.required' => 'وارد کردن تاریخ الزامی است',
            'date.date' => 'لطفا تاریخ مناسبی انتخاب کنید',
            'date.date_format' => 'تاریخ انتخاب شده معتبر نیست',
            'status.required' => 'تعیین وضعیت نمایش الزامی است',
            'status.in' => 'مورد انتخاب شده نامعتبر است',
            'pictures.array' => 'داده های ورودی نامعتبر است',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $messages[$index . '.title.' . 'required'] = 'وارد کردن عنوان الزامی است';
            $messages[$index . '.title.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.title.' . 'max'] = 'تعداد کارکتر ها باید کمتر از 255 باشد';
            $messages[$index . '.details.' . 'required'] = 'وارد کردن شرح الزامی است';
            $messages[$index . '.details.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.details.' . 'max'] = 'تعداد کارکتر ها باید کمتر از 500 باشد';
            $messages[$index . '.text.' . 'required'] = 'وارد کردن متن الزامی است';
            $messages[$index . '.text.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.tags.' . 'required'] = 'وارد کردن برچسب الزامی است';
            $messages[$index . '.tags.' . 'string'] = 'لطفا فقط متن وارد کنید';
        }
        return $messages;
    }
}

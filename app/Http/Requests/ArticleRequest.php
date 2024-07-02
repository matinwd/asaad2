<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'slug' => ['required','alpha_dash',$this->isMethod('patch') ? Rule::unique('articles')->ignore($this->id) : 'unique:articles'],
            'pictures' => 'nullable|array',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $rules[$index . '.title'] = 'required|string|max:255';
            $rules[$index . '.details'] = 'required|string|max:500';
            $rules[$index . '.text'] = 'required|string';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'slug.required' => 'وارد کردن Slug الزامی است',
            'slug.alpha_dash' => 'فقط حروف الفبا/اعداد/کارکتر - و کارکتر _ مجاز است',
            'slug.unique' => 'این Slug قبلا ثبت شده است',
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
        }
        return $messages;
    }
}

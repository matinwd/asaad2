<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'slug' => ['required','alpha_dash',$this->isMethod('patch') ? Rule::unique('categories')->ignore($this->id) : 'unique:categories'],
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $rules[$index . '.title'] = 'required|string';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'slug.required' => 'وارد کردن Slug الزامی است',
            'slug.alpha_dash' => 'فقط حروف الفبا/اعداد/کارکتر - و کارکتر _ مجاز است',
            'slug.unique' => 'این Slug قبلا ثبت شده است',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $messages[$index . '.title.' . 'required'] = 'وارد کردن عنوان الزامی است';
            $messages[$index . '.title.' . 'string'] = 'لطفا فقط متن وارد کنید';
        }
        return $messages;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'slug' => ['required','alpha_dash',$this->isMethod('patch') ? Rule::unique('forms')->ignore($this->id) : 'unique:forms'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام الزامی است',
            'slug.required' => 'وارد کردن Slug الزامی است',
            'slug.alpha_dash' => 'فقط حروف الفبا/اعداد/کارکتر - و کارکتر _ مجاز است',
            'slug.unique' => 'این Slug قبلا ثبت شده است',
        ];
    }
}

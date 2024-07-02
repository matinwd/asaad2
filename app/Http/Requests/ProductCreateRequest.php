<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCreateRequest extends FormRequest
{

    public function rules(): array
    {
        $rules = [
            'slug' => ['required','alpha_dash',$this->isMethod('patch') ? Rule::unique('products')->ignore($this->product) : 'unique:products'],
            'pictures' => 'nullable|array',
            'visibility' => 'required|in:0,1',
            'price_status' => 'required|in:0,1,2,3',
            'price' => 'required_if:price_status,1|numeric',
            'discount'=> 'nullable|numeric',
            'discount_type' => 'nullable|in:percent,fixed',
            'special_price' => 'nullable|numeric',
            'special_price_type' => 'nullable|in:percent,fixed',
            'special_price_start' => 'nullable|date',
            'special_price_end' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id'
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $rules[$index . '.name'] = 'required|string|max:255';
            $rules[$index . '.short_description'] = 'required|string|max:500';
            $rules[$index . '.long_description'] = 'required|string';
        }
        return $rules;

    }


    public function messages()
    {
        $messages = [
            'slug.required' => 'وارد کردن Slug الزامی است',
            'price.required_if' => 'وارد کردن قیمت الزامی است',
            'price.numeric' => 'قیمت فقط میتواند عدد باشد',
            'discount.numeric' => 'تخفیف فقط میتواند عدد باشد',
            'special_price.numeric' => 'قیمت ویژه فقط میتواند عدد باشد',
            'price_status.required' => 'وارد کردن قیمت الزامی است',
            'slug.alpha_dash' => 'فقط حروف الفبا/اعداد/کارکتر - و کارکتر _ مجاز است',
            'slug.unique' => 'این Slug قبلا ثبت شده است',
            'pictures.array' => 'داده های ورودی نامعتبر است',
        ];
        foreach ($this->get('has_lang') as $index => $item) {
            $messages[$index . '.name.' . 'required'] = 'وارد کردن عنوان الزامی است';
            $messages[$index . '.name.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.name.' . 'max'] = 'تعداد کارکتر ها باید کمتر از 255 باشد';
            $messages[$index . '.short_description.' . 'required'] = 'وارد کردن شرح الزامی است';
            $messages[$index . '.short_description.' . 'string'] = 'لطفا فقط متن وارد کنید';
            $messages[$index . '.short_description.' . 'max'] = 'تعداد کارکتر ها باید کمتر از 500 باشد';
            $messages[$index . '.long_description.' . 'required'] = 'وارد کردن متن الزامی است';
            $messages[$index . '.long_description.' . 'string'] = 'لطفا فقط متن وارد کنید';
        }
        return $messages;
    }

}

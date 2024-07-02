<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'en.name' => 'required|min:3',
            'de.name' => 'required|min:3',
            'de.description' => 'required|min:10',
            'en.description' => 'required|min:10',
        ];

    }

    public function messages(): array
    {
        return [
            'en.name.required' => 'وارد کردن تیتر انگلیسی ضروری است',
            'de.name.required' => 'وارد کردن تیتر آلمانی ضروری است',
            'en.description.required' => 'وارد کردن توضیحات انگلیسی ضروری است',
            'de.description.required' => 'وارد کردن توضیحات آلمانی ضروری است',
        ];

    }

}

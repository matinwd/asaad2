<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'en.*' => 'required',
            'en.name' => 'min:3',
            'de.*' => 'required',
            'de.name' => 'min:3',
            'de.description' => 'min:10',
            'en.description' => 'min:10',
        ];

    }

    public function messages()
    {
        return [
            'en.name.required' => 'The English Name is required',
            'en.description.required' => 'The English Description is required',
            'de.description.required' => 'The Dutch Description is required',
            'de.name.required' => 'The Dutch Name is required',
        ];
    }
}

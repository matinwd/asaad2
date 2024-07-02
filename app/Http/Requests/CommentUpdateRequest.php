<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required:min:2',
            'visibility' => 'required|numeric',
            'pictures' => 'nullable|array',
            'description' => 'required:min:2',
        ];
    }
}

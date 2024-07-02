<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'description' => 'required:min:2',
            'parent_id' => 'nullable',
            'post_id' => 'required|exists:posts,id'
        ];
    }


}

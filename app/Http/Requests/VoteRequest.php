<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VoteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'value' => ['required', Rule::in(['upvote', 'downvote'])],
        ];
    }

    public function authorize()
    {
        return true;
    }
}

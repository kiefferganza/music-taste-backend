<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer'],
            'album_id' => ['required', 'exists:albums'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}

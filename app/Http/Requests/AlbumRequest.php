<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'artist' => ['required'],
            'cover' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}

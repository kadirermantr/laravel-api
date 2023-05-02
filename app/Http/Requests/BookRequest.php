<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public static function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'page' => 'required|integer',
            'language' => 'required|string',
        ];
    }
}

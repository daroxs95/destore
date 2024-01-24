<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GameApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:5', 'max:2000'],
            'released' => ['nullable', 'boolean'],
            'download_url' => ['nullable', 'url'],
            'tags' => ['nullable', 'array'],
            'image' => ['file'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'validation errors',
            'errors' => $validator->errors(),
        ])->setStatusCode(422));
    }
}

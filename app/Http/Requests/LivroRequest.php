<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => [
                'required',
                'max:255',
                'min:3',
                'string'
            ],
            'capa' => [
                'image',
                'max:5000'
            ],

            'arquivo' => [
                'required',
                'file',
                'mimes:pdf',
            ]
        ];
    }
}

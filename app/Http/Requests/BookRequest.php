<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'year' => 'required|numeric',
            'pages' => 'numeric'
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'O campo título é obrigatório',
        'pages.numeric' => 'O campo páginas deve conter um valor numérico',
    ];
}
}

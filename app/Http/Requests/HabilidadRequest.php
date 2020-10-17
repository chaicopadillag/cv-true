<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabilidadRequest extends FormRequest
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
            'habilidad'   => 'required|min:3|string|max:50',
            'nivel'       => ['required', 'numeric', 'min:1', 'max:100'],
            'descripcion' => 'required|min:10|max:255',
        ];
    }
}

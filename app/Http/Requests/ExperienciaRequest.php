<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienciaRequest extends FormRequest
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
            'cargo'        => 'required|min:5|string|max:255',
            'empresa'      => 'required|min:5|string|max:255',
            'fecha_inicio' => ['required', 'date', 'date_format:d-m-Y', 'before:fecha_fin'],
            'fecha_fin'    => ['required', 'date', 'date_format:d-m-Y', 'before:fecha_actual'],
            'descripcion'  => 'required|min:10|max:1000',
        ];
    }
}

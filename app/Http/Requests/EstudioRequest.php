<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudioRequest extends FormRequest
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
            'especialidad' => 'required|min:5|string|max:255',
            'universidad' => 'required|min:5|string|max:255',
            'fecha_inicio' => 'required|date|date_format:d-m-Y',
            'fecha_fin' => 'required|date|date_format:d-m-Y',
            'descripcion' => 'required|min:10|max:1000',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'fecha_inicio.date' => ''
    //     ];
    // }
}

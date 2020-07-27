<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'foto'         => ['image', 'dimensions:min_width=512,min_height=512', 'max:2000000', 'mimes:jpg,jpeg,png'],
            'name'         => ['required', 'string', 'min:3', 'max:30'],
            'apellidos'    => ['required', 'string', 'min:3', 'max:30'],
            'especialidad' => ['required', 'string', 'min:6', 'max:30'],
            'direccion'    => ['required', 'string', 'min:10', 'max:100'],
            'telefono'     => ['required', 'string', 'min:6', 'max:20'],
            'ciudad'       => ['required', 'string', 'min:3', 'max:30'],
            'pais'         => ['required', 'string', 'min:3', 'max:30'],
            'genero'       => ['required', 'numeric', 'min:1', 'max:1'],
            'edad'         => ['required', 'numeric', 'min:14', 'max:200'],
            'estado_civil' => ['required', 'string', 'min:6', 'max:30'],
            'frase'        => ['required', 'string', 'min:10', 'max:50'],
            'resumen'      => ['required', 'string', 'min:30', 'max:1000'],
        ];
    }
}

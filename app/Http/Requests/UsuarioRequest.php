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
            'foto'         => ['image', 'dimensions:min_width=512,min_height=512,max_width=764,max_height=764', 'max:1000000', 'mimes:jpg,jpeg,png'],
            'name'         => ['required', 'string', 'min:3', 'max:30'],
            'apellidos'    => ['required', 'string', 'min:3', 'max:30'],
            'especialidad' => ['required', 'string', 'min:6', 'max:30'],
            'direccion'    => ['required', 'string', 'min:10', 'max:100'],
            'telefono'     => ['required', 'string', 'min:6', 'max:20'],
            'ciudad'       => ['required', 'string', 'min:3', 'max:30'],
            'pais'         => ['required', 'string', 'min:3', 'max:30'],
            'genero'       => ['required', 'numeric', 'min:1', 'max:2'],
            'edad'         => ['required', 'numeric', 'min:14', 'max:200'],
            'estado_civil' => ['required', 'string', 'min:6', 'max:30'],
            'frase'        => ['required', 'string', 'min:10', 'max:100'],
            'resumen'      => ['required', 'string', 'min:30', 'max:500'],
        ];
    }
    public function messages()
    {
        return [
            'foto.max' => 'La imagen debe ser menor o igual a 1MB!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioConfigRequest extends FormRequest
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
            'url_usuario'   => ['required', 'string', 'unique:users', 'regex:/^[a-z]+$/i', 'min:3', 'max:20'],
            'cv'            => ['required', 'numeric', 'min:1'],
            'perfil_public' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'url_usuario.unique' => 'El usuario que ingresó ya esta en uso, elija otro',
            'url_usuario.regex'  => 'Usuario ínvalido, solo minúscula, sin espacios ni carácteres especiales',
            'cv.min'             => 'Debe selecionar un modelo de CV',
        ];
    }

}

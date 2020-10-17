<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoEditRequest extends FormRequest
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
            'foto'        => ['file', 'image', 'dimensions:min_width=700,min_height=500,max_width=1200,max_height=764', 'max:1000000', 'mimes:jpg,jpeg,png'],
            // 'foto'        => ['required', 'file', 'image', 'dimensions:min_width=1200,min_height=764,max_width=1200,max_height=764', 'max:1000000', 'mimes:jpg,jpeg,png'],
            'foto_actual' => ['required', 'string'],
            'titulo'      => ['required', 'string', 'min:3', 'max:50'],
            // 'pagina_web'  => ['required', 'active_url', 'min:3', 'max:255'],
            'pagina_web'  => ['required', 'string', 'min:3', 'max:255'],
            'lugar'       => ['required', 'string', 'min:3', 'max:30'],
            'fecha'       => ['required', 'date', 'date_format:d-m-Y', 'before:fecha_actual'],
            'descripcion' => ['required', 'string', 'min:6', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'foto.max'             => 'La imagen debe ser menor o igual a 1MB!',
            'foto_actual.required' => 'Por favor no modifique los atributos del formulario',
        ];
    }
}

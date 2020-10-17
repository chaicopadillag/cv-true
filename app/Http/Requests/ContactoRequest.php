<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'pagina_web' => ['unique:redes_sociales', /*'active_url',*/'max:100'],
            'linkedin'   => ['unique:redes_sociales', 'required', /*'active_url',*/'max:100'],
            'facebook'   => ['unique:redes_sociales', 'required', /*'active_url',*/'max:100'],
            'instagram'  => ['unique:redes_sociales', 'required', /*'active_url',*/'max:100'],
            'twitter'    => ['unique:redes_sociales', /*'active_url',*/'max:100'],
            'tumblr'     => ['unique:redes_sociales', /*'active_url',*/'max:100'],
            'pinterest'  => ['unique:redes_sociales', /*'active_url',*/'max:100'],
            'spotify'    => ['unique:redes_sociales', /*'active_url',*/'max:100'],
            'tiktok'     => ['unique:redes_sociales', /*'active_url',*/'max:100'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoEditRequest extends FormRequest
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
            'pagina_web' => [/*'active_url',*/'max:100'],
            'linkedin'   => ['required', /*'active_url',*/'max:100'],
            'facebook'   => ['required', /*'active_url',*/'max:100'],
            'instagram'  => ['required', /*'active_url',*/'max:100'],
            'twitter'    => [/*'active_url',*/'max:100'],
            'tumblr'     => [/*'active_url',*/'max:100'],
            'pinterest'  => [/*'active_url',*/'max:100'],
            'spotify'    => [/*'active_url',*/'max:100'],
            'tiktok'     => [/*'active_url',*/'max:100'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'between:8,20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@()$%^&*=_{}[\]:;<>,.\/~`±§+-]).{8,20}$/',
            'confirm_password' => 'between:8,20|same:password',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required_if' => 'La contraseña es obligatoria.',
            'password.regex' => 'La contraseña debe contener como mínimo: un número, un carácter especial, una letra mayúscula y una letra minúscula.',
            'confirm_password.required_if'  => 'La confirmación de la contraseña es obligatoria.',
            'confirm_password.same' => 'Los campos contraseña y confirmar contraseña no coinciden',
        ];
    }
}

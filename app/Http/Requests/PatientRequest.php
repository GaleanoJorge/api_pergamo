<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class PatientRequest extends FormRequest
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
        $validate = $this->get('id') > 0 ? $this->get('id') : "NULL";

        return [
            'status_id' => 'required',
            'gender_id' => 'required',
            'academic_level_id' => 'required',
            'identification_type_id' => 'required',
            'birthplace_municipality_id' => 'required',
            'username' => 'required',
            'email' => '',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'nullable|date|before:0 years ago',
            'activities_id' =>'required',
            'age' => 'required',
            // 'phone' => 'nullable|numeric',
            //'identification' => ['required', Rule::unique('patients')->ignore($this->patient)->where('identification_type_id', $this->identification_type_id)]
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
             'birthday.before' => 'La fecha de nacimiento no es valida',
             'identification.unique' => 'El número y tipo de documento ya estan registrados',
            'confirm_password.same' => 'Los campos contraseña y confirmar contraseña no coinciden',
        ];
    }
}

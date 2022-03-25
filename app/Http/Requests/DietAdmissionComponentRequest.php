<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DietAdmissionComponentRequest extends FormRequest
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
            'diet_component_id' => 'required',
            'diet_admission_id' => 'required',
        ];
    }
}

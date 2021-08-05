<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConceptRequest extends FormRequest
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
            'concept_base_id' => 'required|numeric',
            'validity_id' => 'required|numeric',
            //'unit_id' => 'required|numeric',
            'municipality_id' => 'required',
            'unit_value' => 'required',
        ];
    }
}

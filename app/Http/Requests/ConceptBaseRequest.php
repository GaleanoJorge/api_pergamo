<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConceptBaseRequest extends FormRequest
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
            'concept_type_id' => 'required|numeric',
            'transport_type_id' => 'nullable|numeric',
            'unit_id' => 'nullable|numeric',
            'name' => 'required|between:1,250',
            'origin' => 'nullable|between:1,250',
            'destination' => 'nullable|between:1,250',
            'back' => 'nullable|between:1,250',
        ];
    }
}

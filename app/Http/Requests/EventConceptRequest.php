<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventConceptRequest extends FormRequest
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
            'concept_id' => 'required|numeric',
            'event_id' => 'required|numeric',
            'real_date' => 'required|date',
            'real_quantity' => 'required|numeric',
            'real_unit_value' => 'required|numeric',
            'observations'=>'nullable',
            'evidence_path'=>'nullable|between:1,1000',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectEventConceptRequest extends FormRequest
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
            'event_day_id' => 'required|numeric',
            'planned_quantity' => 'required|numeric',
            'planned_unit_value' => 'required|numeric',
        ];
    }
}

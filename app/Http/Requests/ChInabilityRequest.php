<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChInabilityRequest extends FormRequest
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
            'ch_contingency_code_id' => '',
      
            'initial_date' => '',
            'final_date' => '',
            'diagnosis_id' => '',
            'ch_type_inability_id' => '',
            'ch_type_procedure_id' => '',
            'observation' => '',
            'total_days'=> '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

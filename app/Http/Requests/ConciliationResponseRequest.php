<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConciliationResponseRequest extends FormRequest
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
            'gloss_conciliations_id' => 'required',
            'objetion_response_id' => '', 
            'response'=> 'required',
            'objetion_code_response_id' => '',
            'justification_status' => '',
            'accepted_value' => '',
            'value_not_accepted' => '',
        ];
    }
}

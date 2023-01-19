<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
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
            'contract_id' => 'required',
            'policy_value' => 'required',
            'policy_type_id' => 'required',
		    'insurance_carrier_id' => 'required',
		    'start_date' => '',
		    'finish_date' => '',
		    'policy_file' => '',
        ];
    }
}

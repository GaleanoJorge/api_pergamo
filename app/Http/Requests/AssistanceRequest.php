<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssistanceRequest extends FormRequest
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
            'user_id' => 'required',
            'medical_record' => 'required',
            'contract_type_id' => 'required',
            // 'cost_center_id' => '',
            'type_professional_id' => '',
            'attends_external_consultation' => 'required',
            'serve_multiple_patients' => 'required',
            'file_firm' => 'required',

        ];
    }
}

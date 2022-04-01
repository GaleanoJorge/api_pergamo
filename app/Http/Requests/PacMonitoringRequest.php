<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacMonitoringRequest extends FormRequest
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
            'admissions_id' => 'required',
            'application_date' => '',
            'type_plan' =>'',
            'authorization_pin' => '',
            'profesional_user_id' => '',
            'diagnosis_id' => '',           
            'reception_hour' => '',           
            'presentation_hour' => '',           
            'acceptance_hour' => '',           
            'offer_hour' => '',           
            'start_consult_hour' => '',           
            'finish_consult_hour' => '',           
            'close_date' => '',           
            'close_crm_hour' => '',           
            'copay_value' => '',           

        ];
    }
}

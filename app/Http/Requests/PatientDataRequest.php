<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientDataRequest extends FormRequest
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
            'patient_data_firstname' => 'required',
            'patient_data_middlefirstname' => 'required',
            'patient_data_lastname' => 'required',
            'patient_data_middlelastname' => 'required',
            'patient_data_identification' => 'required',
            'patient_data_phone' => 'required',
            'patient_data_email' => 'required',
            'patient_data_residence_address' => 'required',
            'identification_type_id' => 'required',
            'affiliate_type_id' => 'required',
            'special_attention_id' => 'required',
            
            
            
        ];
    }
}

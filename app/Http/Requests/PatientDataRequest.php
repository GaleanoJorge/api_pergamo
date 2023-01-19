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
            'admissions_id' => 'required',
            'patient_data_type' => 'required', 
            'firstname' => 'required',
            'lastname' => 'required',
            'identification' => 'required',
            'phone' => '',
            'email' => '',
            'residence_address' => 'required',
            'identification_type_id' => 'required',
            // 'affiliate_type_id' => 'required',
            // 'special_attention_id' => 'required',
            'relationship_id' => 'required',

            
        ];
    }
}

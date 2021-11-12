<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionsRequest extends FormRequest
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
            'admission_route_id' => 'required',
            'campus_id' => 'required',
            'scope_of_attention_id' => 'required',
            'program_id' => 'required',
            'pavilion_id' => 'required',
            'flat_id' => 'required',
            'bed_id' => 'required',
            'contract_id' => 'required',
            'patient_data_id' => 'required',
            'user_id' => 'required',
            
            
            
        ];
    }
}

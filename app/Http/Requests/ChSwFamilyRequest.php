<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChSwFamilyRequest extends FormRequest
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
            'firstname' => '',
            'middlefirstname' => '',
            'lastname' => '',
            'middlelastname' => '',
            'range_age' => '',
            'identification' => '',
            'phone' => '',
            'landline' => '',
            'email' => '',
            'residence_address' => '',
            'is_disability' => '',
            'relationship_id' => '',
            'identification_type_id' => '',
            'marital_status_id' => '',
            'academic_level_id' => '',
            'study_level_status_id' => '',
            'activities_id' => '',
            'inability_id' => '',
            'carer' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

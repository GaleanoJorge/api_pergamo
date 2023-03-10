<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChRespiratoryTherapyRequest extends FormRequest
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
            'medical_diagnosis_id' => '',
            'therapeutic_diagnosis' => '',
            'reason_consultation' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

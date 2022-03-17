<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChReasonConsultationRequest extends FormRequest
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
            'reason_consultation' => '',
            'current_illness' => '',
            'ch_external_cause_id' => '',
            'type_record_id' => '',
            'ch_record_id' => '', 
        ];
    }
}

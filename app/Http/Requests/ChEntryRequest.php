<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEntryRequest extends FormRequest
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
            'status' => 'required',
            'reason_consultation' => 'required',
            'current_illness' => 'required',
            'ch_external_cause_id' => '',
            'ch_entry_review_system_id' => '',
            'ch_vital_signs_id' => '',
            'ch_diagnosis_id' => '',
        ];
    }
}

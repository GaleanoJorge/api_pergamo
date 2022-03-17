<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChDiagnosisRequest extends FormRequest
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
            'ch_diagnosis_type_id' => 'required',
            'ch_diagnosis_class_id' => 'required',
            'diagnosis_id' => 'required',
            'diagnosis_observation' => 'required',
        ];
    }
}

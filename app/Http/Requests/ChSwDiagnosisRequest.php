<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChSwDiagnosisRequest extends FormRequest
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
            //
            'ch_diagnosis_id' => 'required',
            'sw_diagnosis' => 'required',
            'type_record_id' => 'required',
            'ch_record_id' => 'required',
            
            

        ];
    }
}

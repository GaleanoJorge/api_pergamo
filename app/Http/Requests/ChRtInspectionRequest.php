<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChRtInspectionRequest extends FormRequest
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
            'expansion' => '',
            'masses' => '',
            'detail_masses' => '',
            'crepitations' => '',
            'fracturues' => '',
            'detail_fracturues' => '',
            'airway' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

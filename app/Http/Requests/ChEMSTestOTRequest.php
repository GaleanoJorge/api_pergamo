<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEMSTestOTRequest extends FormRequest
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
            'appearance' => '',
            'consent' => '',
            'Attention' => '',
            'humor' => '',
            'language' => '',
            'sensory_perception' => '',
            'grade' => '',
            'contents' => '',
            'orientation' => '',
            'sleep' => '',
            'memory' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

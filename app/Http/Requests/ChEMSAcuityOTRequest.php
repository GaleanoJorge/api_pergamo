<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEMSAcuityOTRequest extends FormRequest
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
            'follow_up' => '',
            'object_identify' => '',
            'figures' => '',
            'color_design' => '',
            'categorization' => '',
            'special_relation' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

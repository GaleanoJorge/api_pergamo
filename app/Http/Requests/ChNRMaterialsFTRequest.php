<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChNRMaterialsFTRequest extends FormRequest
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
            'Material_1' => '',
            'Material_2' => '',
            'Material_3' => '',
            'Material_4' => '',
            'Material_5' => '',
            'Material_6' => '',
            'Material_7' => '',
            'Material_8' => '',
            'Material_9' => '',
            'Material_10' => '',
            'Material_11' => '',
            'Material_12' => '',
            'Material_13' => '',
            'Material_14' => '',
            'Material_15' => '',
            'Material_16' => '',
            'Material_17' => '',
            'Material_18' => '',
            'Material_19' => '',
            'Material_20' => '',
            'Material_21' => '',
            'Material_22' => '',
            'Material_23' => '',
            'Material_24' => '',
            'Material_25' => '',
            'Material_26' => '',
            'Material_27' => '',
            'Material_28' => '',
            'Material_29' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

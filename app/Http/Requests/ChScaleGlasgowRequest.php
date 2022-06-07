<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleGlasgowRequest extends FormRequest
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
            'ocular_title' => '',
            'ocular_value' => '',
            'ocular_detail' => '',
            'verbal_title' => '',
            'verbal_value' => '',
            'verbal_detail' => '',
            'motor_title' => '',
            'motor_value' => '',
            'motor_detail' => '',
            'total' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

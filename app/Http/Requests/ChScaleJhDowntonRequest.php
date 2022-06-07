<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleJhDowntonRequest extends FormRequest
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
            'falls_title' => '',
            'falls_value' => '',
            'falls_detail' => '',
            'medication_title' => '',
            'medication_value' => '',
            'medication_detail' => '',
            'deficiency_title' => '',
            'deficiency_value' => '',
            'deficiency_detail' => '',
            'mental_title' => '',
            'mental_value' => '',
            'mental_detail' => '',
            'wandering_title' => '',
            'wandering_value' => '',
            'wandering_detail' => '',
            'total' => '',
            'risk' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

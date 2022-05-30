<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleEsasRequest extends FormRequest
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
            'pain_title' => '',
            'pain_value' => '',
            'tiredness_title' => '',
            'tiredness_value' => '',
            'retching_title' => '',
            'retching_value' => '',
            'depression_title' => '',
            'depression_value' => '',
            'anxiety_title' => '',
            'anxiety_value' => '',
            'drowsiness_title' => '',
            'drowsiness_value' => '',
            'appetite_title' => '',
            'appetite_value' => '',
            'breathing_title' => '',
            'breathing_value' => '',
            'welfare_title' => '',
            'welfare_value' => '',
            'sleep_title' => '',
            'sleep_value' => '',
            'observation' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

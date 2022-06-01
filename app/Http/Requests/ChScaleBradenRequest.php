<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleBradenRequest extends FormRequest
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
            'sensory_title' => '',
            'sensory_value' => '',
            'sensory_detail' => '',
            'humidity_title' => '',
            'humidity_value' => '',
            'humidity_detail' => '',
            'activity_title' => '',
            'activity_value' => '',
            'activity_detail' => '',
            'mobility_title' => '',
            'mobility_value' => '',
            'mobility_detail' => '',
            'nutrition_title' => '',
            'nutrition_value' => '',
            'nutrition_detail' => '',
            'lesion_title' => '',
            'lesion_value' => '',
            'lesion_detail' => '',
            'total' => '',
            'risk' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

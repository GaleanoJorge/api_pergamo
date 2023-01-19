<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleFlaccRequest extends FormRequest
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
            'face_title' => '',
            'face_value' => '',
            'face_detail' => '',
            'leg_titles' => '',
            'legs_value' => '',
            'legs_detail' => '',
            'activity_title' => '',
            'activity_value' => '',
            'activity_detail' => '',
            'crying_title' => '',
            'crying_value' => '',
            'crying_detail' => '',
            'comfor_titlet' => '',
            'comfort_value' => '',
            'comfort_detail' => '',
            'total' => '',
            'classification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

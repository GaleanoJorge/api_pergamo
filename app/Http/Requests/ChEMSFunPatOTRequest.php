<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEMSFunPatOTRequest extends FormRequest
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
            'head_right' => '',
            'head_left' => '',
            'mouth_right' => '',
            'mouth_left' => '',
            'shoulder_right' => '',
            'shoulder_left' => '',
            'back_right' => '',
            'back_left' => '',
            'waist_right' => '',
            'waist_left' => '',
            'knee_right' => '',
            'knee_left' => '',
            'foot_right' => '',
            'foot_left' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

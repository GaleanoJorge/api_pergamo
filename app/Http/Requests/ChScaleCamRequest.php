<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleCamRequest extends FormRequest
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
            'mind_title' => '',
            'mind_value' => '',
            'mind_detail' => '',
            'attention_title' => '',
            'attention_value' => '',
            'attention_detail' => '',
            'thought_title' => '',
            'thought_value' => '',
            'thought_detail' => '',
            'awareness_title' => '',
            'awareness_value' => '',
            'awareness_detail' => '',
            'result' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleNortonRequest extends FormRequest
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
            'physical_title' => '',
            'physical_value' => '',
            'physical_detail' => '',
            'mind_title' => '',
            'mind_value' => '',
            'mind_detail' => '',
            'mobility_title' => '',
            'mobility_value' => '',
            'mobility_detail' => '',
            'activity_title' => '',
            'activity_value' => '',
            'activity_detail' => '',
            'incontinence_title' => '',
            'incontinence_value' => '',
            'incontinence_detail' => '',
            'total' => '',
            'risk' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPhysicalExamRequest extends FormRequest
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
            'revision' => '',
            'observation' => '',
            'type_ch_physical_exam_id' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

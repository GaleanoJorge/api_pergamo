<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChTherapeuticAssRequest extends FormRequest
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
            'ch_ass_pattern_id' => '',
            'ch_ass_swing_id' => '',
            'ch_ass_frequency_id' => '',
            'ch_ass_mode_id' => '',
            'ch_ass_cough_id' => '',
            'ch_ass_chest_type_id' => '',
            'ch_ass_chest_symmetry_id' => '',
            'ch_ass_signs_id' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

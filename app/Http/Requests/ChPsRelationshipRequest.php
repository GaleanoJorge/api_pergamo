<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPsRelationshipRequest extends FormRequest
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
            'position' => '',
            'self_care' => '',
            'visual' => '',
            'verbal' => '',
            'appearance' => '',
            'att_observations' => '',
            'aw_observations' => '',
            'sl_observations' => '',
            'sex_observations' => '',
            'fee_observations' => '',
            'ex_observations' => '',
            'attitude' => '',
            'ch_ps_awareness_id' => '',
            'ch_ps_sleep_id' => '',
            'exam_others' => '',
            'sexuality' => '',
            'feeding' => '',
            'excretion' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

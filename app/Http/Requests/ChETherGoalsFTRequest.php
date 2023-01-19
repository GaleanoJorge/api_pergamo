<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChETherGoalsFTRequest extends FormRequest
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
            'check1_hold' => '',
            'check2_improve' => '',
            'check3_structure' => '',
            'check4_promote' => '',
            'check5_strengthen' => '',
            'check6_promote_2' => '',
            'check7_develop' => '',
            'check8_strengthen_2' => '',
            'check9_favor' => '',
            'check10_functionality' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

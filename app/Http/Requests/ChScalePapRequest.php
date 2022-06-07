<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScalePapRequest extends FormRequest
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
            'v_one_title' => '',
            'v_one_value' => '',
            'v_one_detail' => '',
            'v_two_title' => '',
            'v_two_value' => '',
            'v_two_detail' => '',
            'v_three_title' => '',
            'v_three_value' => '',
            'v_three_detail' => '',
            'v_four_title' => '',
            'v_four_value' => '',
            'v_four_detail' => '',
            'v_five_title' => '',
            'v_five_value' => '',
            'v_five_detail' => '',
            'v_six_title' => '',
            'v_six_value' => '',
            'v_six_detail' => '',
            'total' => '',
            'classification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',

        ];
    }
}

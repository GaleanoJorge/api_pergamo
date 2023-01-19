<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleHamiltonRequest extends FormRequest
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
            'v_seven_title' => '',
            'v_seven_value' => '',
            'v_seven_detail' => '',
            'v_eight_title' => '',
            'v_eight_value' => '',
            'v_eight_detail' => '',
            'v_nine_title' => '',
            'v_nine_value' => '',
            'v_nine_detail' => '',
            'v_ten_title' => '',
            'v_ten_value' => '',
            'v_ten_detail' => '',
            'v_eleven_title' => '',
            'v_eleven_value' => '',
            'v_eleven_detail' => '',
            'v_twelve_title' => '',
            'v_twelve_value' => '',
            'v_twelve_detail' => '',
            'v_thirteen_title' => '',
            'v_thirteen_value' => '',
            'v_thirteen_detail' => '',
            'v_fourteen_title' => '',
            'v_fourteen_value' => '',
            'v_fourteen_detail' => '',
            'v_fifteen_title' => '',
            'v_fifteen_value' => '',
            'v_fifteen_detail' => '',
            'v_sixteen_title' => '',
            'v_sixteen_value' => '',
            'v_sixteen_detail' => '',
            'v_seventeen_value' => '',
            'v_seventeen_title' => '',
            'v_seventeen_detail' => '',
            'total' => '',
            'qualification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

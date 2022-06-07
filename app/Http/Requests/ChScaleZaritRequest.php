<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleZaritRequest extends FormRequest
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
        'q_one_title' =>'',
        'q_one_value' =>'',
        'q_one_detail' =>'',
        'q_two_title' =>'',
        'q_two_value' =>'',
        'q_two_detail' =>'',
        'q_three_title' =>'',
        'q_three_value' =>'',
        'q_three_detail' =>'',
        'q_four_title' =>'',
        'q_four_value' =>'',
        'q_four_detail' =>'',
        'q_five_title' =>'',
        'q_five_value' =>'',
        'q_five_detail' =>'',
        'q_six_title' =>'',
        'q_six_value' =>'',
        'q_six_detail' =>'',
        'q_seven_title' =>'',
        'q_seven_value' =>'',
        'q_seven_detail' =>'',
        'q_eight_title' =>'',
        'q_eight_value' =>'',
        'q_eight_detail' =>'',
        'q_nine_title' =>'',
        'q_nine_value' =>'',
        'q_nine_detail' =>'',
        'q_ten_title' =>'',
        'q_ten_value' =>'',
        'q_ten_detail' =>'',
        'q_eleven_title' =>'',
        'q_eleven_value' =>'',
        'q_eleven_detail' =>'',
        'q_twelve_title' =>'',
        'q_twelve_value' =>'',
        'q_twelve_detail' =>'',
        'q_thirteen_title' =>'',
        'q_thirteen_value' =>'',
        'q_thirteen_detail' =>'',
        'q_fourteen_title' =>'',
        'q_fourteen_value' =>'',
        'q_fourteen_detail' =>'',
        'q_fifteen_title' =>'',
        'q_fifteen_value' =>'',
        'q_fifteen_detail' =>'',
        'q_sixteen_title' =>'',
        'q_sixteen_value' =>'',
        'q_sixteen_detail' =>'',
        'q_seventeen_title' =>'',
        'q_seventeen_value' =>'',
        'q_seventeen_detail' =>'',
        'q_eighteen_title' =>'',
        'q_eighteen_value' =>'',
        'q_eighteen_detail' =>'',
        'q_nineteen_title' =>'',
        'q_nineteen_value' =>'',
        'q_nineteen_detail' =>'',
        'q_twenty_title' =>'',
        'q_twenty_value' =>'',
        'q_twenty_detail' =>'',
        'q_twenty_one_title' =>'',
        'q_twenty_one_value' =>'',
        'q_twenty_one_detail' =>'',
        'q_twenty_two_title' =>'',
        'q_twenty_two_value' =>'',
        'q_twenty_two_detail' =>'',
        'total' =>'',
        'classification' =>'',
        'type_record_id' => '',
        'ch_record_id' => '',
        
    ];
    }
}

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
        'q_one' =>'',
        'q_two' =>'',
        'q_three' =>'',
        'q_four' =>'',
        'q_five' =>'',
        'q_six' =>'',
        'q_seven' =>'',
        'q_eight' =>'',
        'q_nine' =>'',
        'q_ten' =>'',
        'q_eleven' =>'',
        'q_twelve' =>'',
        'q_thirteen' =>'',
        'q_fourteen' =>'',
        'q_fifteen' =>'',
        'q_sixteen' =>'',
        'q_seventeen' =>'',
        'q_eighteen' =>'',
        'q_nineteen' =>'',
        'q_twenty' =>'',
        'q_twenty_one' =>'',
        'q_twenty_two' =>'',
        'total' =>'',
        'classification' =>'',
        'type_record_id' => '',
        'ch_record_id' => '',
        
    ];
    }
}

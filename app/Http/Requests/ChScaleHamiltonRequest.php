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
            'variable_one' => '',
            'variable_two' => '',
            'variable_three' => '',
            'variable_four' => '',
            'variable_five' => '',
            'variable_six' => '',
            'variable_seven' => '',
            'variable_eigth' => '',
            'variable_nine' => '',
            'variable_ten' => '',
            'variable_eleven' => '',
            'variable_twelve' => '',
            'variable_thirteen' => '',
            'variable_fourteen' => '',
            'variable_fifteen' => '',
            'variable_sixteen' => '',
            'variable_seventeen' => '',
            'total' => '',
            'qualification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

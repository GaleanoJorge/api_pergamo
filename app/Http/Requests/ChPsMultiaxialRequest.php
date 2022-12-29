<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPsMultiaxialRequest extends FormRequest
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
            'axis_one_id' => '',
            'axis_two_id' => '',
            'axis_three_id' => '',
            'axis_four_id' => '',
            'eeag' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

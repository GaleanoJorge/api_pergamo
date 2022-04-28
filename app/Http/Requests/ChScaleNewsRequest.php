<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleNewsRequest extends FormRequest
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
            'parameter_one'=> '',
            'parameter_two'=> '',
            'parameter_three'=> '',
            'parameter_four'=> '',
            'parameter_five'=> '',
            'parameter_six'=> '',
            'parameter_seven'=> '',
            'parameter_eight'=> '',
            'qualification'=> '',
            'risk'=> '',
            'response'=> '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

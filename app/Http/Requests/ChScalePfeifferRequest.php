<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScalePfeifferRequest extends FormRequest
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
            'study' => '',
            'question_one' => '',
            'question_two' => '',
            'question_three' => '',
            'question_four' => '',
            'question_five' => '',
            'question_six' => '',
            'question_seven' => '',
            'question_eight' => '',
            'question_nine' => '',
            'question_ten' => '',
            'total' => '',
            'classification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

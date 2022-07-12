<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChObjectivesTherapyRequest extends FormRequest
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
            'strengthen' => '',
            'promote' => '',
            'title' => '',
            'improve' => '',
            're_education' => '',
            'hold' => '',
            'check' => '',
            'train' => '',
            'headline' => '',
            'look_out' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

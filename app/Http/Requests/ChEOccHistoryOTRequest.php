<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEOccHistoryOTRequest extends FormRequest
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
            'ocupation' => '',
            'enterprice_employee' => '',
            'work_employee' => '',
            'shift_employee' => '',
            'observation_employee' => '',
            'work_independent' => '',
            'shift_independent' => '',
            'observation_independent' => '',
            'observation_home' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

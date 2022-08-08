<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChSwOccupationalHistoryRequest extends FormRequest
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
            'worked' => '',
            'study' => '',
            'home' => '',
            'none' => '',
            'ch_sw_occupation_id' => '',
            'ch_sw_seniority_id' => '',
            'ch_sw_hours_id' => '',
            'ch_sw_turn_id' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

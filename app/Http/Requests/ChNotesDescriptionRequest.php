<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChNotesDescriptionRequest extends FormRequest
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
            'patient_position_id'=> 'required',
            'ostomy_id'=> 'required',
            'hair_revision'=> '',
            'has_oxigen'=> '',
            'oxygen_type_id'=> '',
            'liters_per_minute_id'=> '',
            'change_position_id'=> 'required',
            'patient_dry'=> 'required',
            'unit_arrangement'=> 'required',
            'type_record_id'=> 'required',
            'ch_record_id'=> 'required',

        ];
    }
}
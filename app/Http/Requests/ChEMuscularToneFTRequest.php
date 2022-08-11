<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ChEMuscularToneFTRequest extends FormRequest
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
            'head' => '',
            'sup_left' => '',
            'hand_left' => '',
            'sup_right' => '',
            'hand' => '',
            'trunk' => '',
            'inf_left' => '',
            'left_foot' => '',
            'inf_right' => '',
            'right_foot' => '',
            'observation' => '',

            'type_record_id' => '',
            'ch_record_id' => ''

        

        ];
    }
}

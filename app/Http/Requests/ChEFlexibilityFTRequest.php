<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ChEFlexibilityFTRequest extends FormRequest
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
            'trunk' => '',
            'sup_right' => '',
            'sup_left' => '',
            'inf_right' => '',
            'inf_left' => '',
            'observation' => '',

            'type_record_id' => '',
            'ch_record_id' => ''

        

        ];
    }
}

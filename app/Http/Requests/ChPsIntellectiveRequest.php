<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPsIntellectiveRequest extends FormRequest
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
            'memory' => '',
            'att_observations' => '',
            'me_observations' => '',
            'perception' => '',
            'per_observations' => '',
            'autopsychic' => '',
            'allopsychic' => '',
            'space' => '',
            'ch_ps_attention_id' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

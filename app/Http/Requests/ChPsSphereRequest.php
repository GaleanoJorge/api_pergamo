<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPsSphereRequest extends FormRequest
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
            'euthymia' => '',
            'observations' => '',
            'ch_ps_sadness_id' => '',
            'ch_ps_joy_id' => '',
            'ch_ps_fear_id' => '',
            'ch_ps_anger_id' => '',
            'ch_ps_insufficiency_id' => '',
            'ch_ps_several_id' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

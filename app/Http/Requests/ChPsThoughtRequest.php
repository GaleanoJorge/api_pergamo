<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPsThoughtRequest extends FormRequest
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
            'grade' => '',
            'contents' => '',
            'prevalent' => '',
            'observations' => '',
            'ch_ps_speed_id' => '',
            'ch_ps_delusional_id' => '',
            'ch_ps_overrated_id' => '',
            'ch_ps_obsessive_id' => '',
            'ch_ps_association_id' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

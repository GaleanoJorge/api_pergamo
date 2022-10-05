<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPsLanguageRequest extends FormRequest
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
            'ch_ps_expressive_id' => '',
            'ch_ps_comprehensive_id' => '',
            'ch_ps_others_id' => '',
            'ch_ps_paraphasias_id' => '',
            'observations' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

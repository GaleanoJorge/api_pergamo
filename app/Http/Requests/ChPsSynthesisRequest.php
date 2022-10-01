<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChPsSynthesisRequest extends FormRequest
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
            'ch_ps_psychomotricity_id' => '',
            'observations_psy' => '',
            'ch_ps_introspection_id' => '',
            'observations_in' => '',
            'ch_ps_judgment_id' => '',
            'observations_jud' => '',
            'ch_ps_prospecting_id' => '',
            'observations_pros' => '',
            'ch_ps_intelligence_id' => '',
            'observations_inte' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

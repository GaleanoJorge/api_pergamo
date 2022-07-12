<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChAuscultationRequest extends FormRequest
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
            'murmur' => '',
            'obs_murmur' => '',
            'crepits' => '',
            'obs_crepits' => '',
            'rales' => '',
            'obs_rales' => '',
            'stridor' => '',
            'obs_stridor' => '',
            'pleural' => '',
            'obs_pleural' => '',
            'roncus' => '',
            'obs_roncus' => '',
            'wheezing' => '',
            'obs_wheezing' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

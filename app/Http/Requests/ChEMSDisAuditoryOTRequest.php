<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEMSDisAuditoryOTRequest extends FormRequest
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
            'sound_sources' => '',
            'auditory_hyposensitivity' => '',
            'auditory_hypersensitivity' => '',
            'auditory_stimuli' => '',
            'auditive_discrimination' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

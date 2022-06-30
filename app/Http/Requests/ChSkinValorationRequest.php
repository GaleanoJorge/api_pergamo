<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChSkinValorationRequest extends FormRequest
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
            'diagnosis_id' => 'required',
            'body_region_id' => 'required',
            'skin_status_id' => 'required',
            'exudate' => '',
            'concentrated' => '',
            'infection_sign' => '',
            'surrounding_skin' => '',
            'observation' => '',
            'type_record_id' => 'required',
            'ch_record_id' => 'required',
        ];
    }
}

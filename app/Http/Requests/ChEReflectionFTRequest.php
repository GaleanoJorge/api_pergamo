<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ChEReflectionFTRequest extends FormRequest
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
            'bicipital' => '',
            'radial' => '',
            'triceps' => '',
            'patellar' => '',
            'aquilano' => '',
            'reflexes' => '',
            'observation' => '',

            'type_record_id' => '',
            'ch_record_id' => ''

        

        ];
    }
}
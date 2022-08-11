<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ChESysIntegumentaryFTRequest extends FormRequest
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
            'colaboration' => '',
            'integrity' => '',
            'texture' => '',
            'sweating' => '',
            'elasticity' => '',
            'extensibility' => '',
            'mobility' => '',
            'scar' => '',
            'bedsores' => '',
            'location' => '',

            'type_record_id' => '',
            'ch_record_id' => ''

        

        ];
    }
}

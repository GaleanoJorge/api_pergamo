<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChSwHousingAspectRequest extends FormRequest
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
            'flat' => '',
            'lift' => '',
            'location' => '',
            'vehicle_access' => '',
            'ch_sw_housing_type_id' => '',
            'ch_sw_housing_id' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

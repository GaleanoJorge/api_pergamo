<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputMaterialsUsedTlRequest extends FormRequest
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
            'biosecurity_elements' => '',
            'didactic_materials' => '',
            'liquid_food' => '',
            'stationery' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChSwSupportNetworkRequest extends FormRequest
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
            'provided' => '',
            'sw_note' => '',
            'ch_sw_entity_id' => '',
            'observation' => '',
            'ch_sw_network_id' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

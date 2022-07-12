<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChLiquidControlRequest extends FormRequest
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
            'clock' => 'required',
            'ch_route_fluid_id' => '',
            'ch_type_fluid_id' => '',
            'delivered_volume' => '',
            'bag_number' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

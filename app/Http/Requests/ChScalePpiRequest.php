<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScalePpiRequest extends FormRequest
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
            'pps_title' => '',
            'pps_value' => '',
            'pps_detail' => '',
            'oral_title' => '',
            'oral_value' => '',
            'oral_detail' => '',
            'edema_title' => '',
            'edema_value' => '',
            'edema_detail' => '',
            'dyspnoea_title' => '',
            'dyspnoea_value' => '',
            'dyspnoea_detail' => '',
            'delirium_title' => '',
            'delirium_value' => '',
            'delirium_detail' => '',
            'total' => '',
            'classification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

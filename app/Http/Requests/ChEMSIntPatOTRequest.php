<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEMSIntPatOTRequest extends FormRequest
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
            'up_right' => '',
            'up_left' => '',
            'side_right' => '',
            'side_left' => '',
            'backend_right' => '',
            'backend_left' => '',
            'frontend_right' => '',
            'frontend_left' => '',
            'down_right' => '',
            'down_left' => '',
            'full_hand_right' => '',
            'full_hand_left' => '',
            'cylindric_right' => '',
            'cylindric_left' => '',
            'hooking_right' => '',
            'hooking_left' => '',
            'fine_clamp_right' => '',
            'fine_clamp_left' => '',
            'tripod_right' => '',
            'tripod_left' => '',
            'opposition_right' => '',
            'opposition_left' => '',
            'coil_right' => '',
            'coil_left' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

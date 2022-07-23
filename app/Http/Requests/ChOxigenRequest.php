<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChOxigenRequest extends FormRequest
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
            'oxygen_type_id' => 'required',
            'liters_per_minute_id' => 'required',
            'type_record_id' => '',
            'ch_record_id' => '',

        ];
    }
}

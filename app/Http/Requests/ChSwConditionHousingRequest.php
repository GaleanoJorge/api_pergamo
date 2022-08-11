<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChSwConditionHousingRequest extends FormRequest
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
            'water' => '',
            'light' => '',
            'telephone' => '',
            'sewerage' => '',
            'gas' => '',
            'num_rooms' => '',
            'persons_rooms' => '',
            'rooms' => '',
            'living_room' => '',
            'dinning_room' => '',
            'kitchen' => '',
            'bath' => '',
            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}

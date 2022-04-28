<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleBarthelRequest extends FormRequest
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
            'eat' => '',
            'move' => '',
            'cleanliness' => '',
            'toilet' => '',
            'shower' => '',
            'commute' => '',
            'stairs' => '',
            'dress' => '',
            'stool' => '',
            'urine' => '',
            'classification' => '',
            'score' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

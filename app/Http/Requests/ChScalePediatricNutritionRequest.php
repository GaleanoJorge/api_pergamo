<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScalePediatricNutritionRequest extends FormRequest
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
            'score_one' => '',
            'score_two' => '',
            'score_three' => '',
            'score_four' => '',
            'total' => '',
            'risk' => '',
            'classification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

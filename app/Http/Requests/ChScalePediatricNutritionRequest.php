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
            'score_one_title' => '',
            'score_one_value' => '',
            'score_one_detail' => '',
            'score_two_title' => '',
            'score_two_value' => '',
            'score_two_detail' => '',
            'score_three_title' => '',
            'score_three_value' => '',
            'score_three_detail' => '',
            'score_four_title' => '',
            'score_four_value' => '',
            'score_four_detail' => '',
            'total' => '',
            'risk' => '',
            'classification' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

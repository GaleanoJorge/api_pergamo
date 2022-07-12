<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChNutritionFoodHistoryRequest extends FormRequest
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
            // 'description' => 'required',
            // 'is_allergic' => 'required',
            // 'allergy' => 'required',
            // 'appetite' => 'required',
            // 'intake' => 'required',
            // 'swallowing' => 'required',
            // 'diet_type' => 'required',
            // 'parenteral_nutrition' => 'required',
            // 'intake_control' => 'required',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChNutritionGastrointestinalRequest extends FormRequest
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
            // 'is_functional' => 'required',
            // 'weight' => 'required',
            // 'size' => 'required',
            // 'arm_circunferency' => 'required',
            // 'calf_circumference' => 'required',
            // 'knee_height' => 'required',
            // 'abdominal_perimeter' => 'required',
            // 'hip_perimeter' => 'required',
            // 'type_record_id' => 'required',
            // 'ch_record_id' => 'required',

        ];
    }
}

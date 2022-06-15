<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChScaleLawtonRequest extends FormRequest
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
            'phone_title' => '',
            'phone_value' => '',
            'phone_detail' => '',
            'shopping_title' => '',
            'shopping_value' => '',
            'shopping_detail' => '',
            'food_title' => '',
            'food_value' => '',
            'food_detail' => '',
            'house_title' => '',
            'house_value' => '',
            'house_detail' => '',
            'clothing_title' => '',
            'clothing_value' => '',
            'clothing_detail' => '',
            'transport_title' => '',
            'transport_value' => '',
            'transport_detail' => '',
            'medication_title' => '',
            'medication_value' => '',
            'medication_detail' => '',
            'finance_title' => '',
            'finance_value' => '',
            'finance_detail' => '',
            'total' => '',
            'risk' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

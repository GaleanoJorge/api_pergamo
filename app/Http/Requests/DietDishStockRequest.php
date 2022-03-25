<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DietDishStockRequest extends FormRequest
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
            'amount' => 'required',
            'diet_dish_id' => 'required',
            'diet_supplies_id' => 'required',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DietMenuRequest extends FormRequest
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
            'name' => 'required',
            'diet_consistency_id' => 'required',
            'diet_component_id' => 'required',
            'diet_menu_type_id' => 'required',
            'diet_week_id' => 'required',
            'diet_day_id' => 'required',
        ];
    }
}

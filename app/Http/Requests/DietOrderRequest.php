<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DietOrderRequest extends FormRequest
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
            'diet_menu_id' => 'required',
            'admissions_id' => 'required',
        ];
    }
}

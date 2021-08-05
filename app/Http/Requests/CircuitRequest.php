<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CircuitRequest extends FormRequest
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
            'district_id' => 'nullable|numeric',
            'status_id' => 'nullable|numeric',
            'name' => 'required|between:1,191',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependenceRequest extends FormRequest
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
            'status_id' => 'nullable|numeric',
            'name' => 'required|between:1,191',
        ];
    }
}

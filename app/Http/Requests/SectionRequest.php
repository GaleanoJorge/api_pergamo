<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            //'answer_type_id' => 'required_if:is_matriz,==,1|numeric',
            'name' => 'required|between:1,191',
            'description' => 'required',
            'is_matriz' => 'required|boolean',
        ];
    }
    
}

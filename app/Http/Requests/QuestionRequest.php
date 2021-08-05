<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question_type_id' => 'required|numeric',
            'section_id' => 'numeric',
            'name' => 'required|between:1,191',
            //'order' => 'required|numeric',
            
            
        ];
    }
}

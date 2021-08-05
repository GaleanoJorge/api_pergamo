<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
            'survey_type_id' => 'required|numeric',
            'status_id' => 'numeric',
            'name' => 'required|between:1,191',
            'description' => 'required',
            'duration' => 'required|date_format:H:i',
            //'url_image' => 'url',
            'max_points' => 'numeric'
        ];
    }
}

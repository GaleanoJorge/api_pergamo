<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyInstanceRequest extends FormRequest
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
            'survey_id' => 'required|numeric',
            'dt_init' => 'required|date',
            'dt_finish' => 'required|date|after_or_equal:dt_init',
            'status_id' => 'required|numeric',
            'validity_id' => 'required|numeric',
        ];
    }
}

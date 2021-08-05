<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseMainRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'campus_id' => 'required|numeric',
            'entity_type_id' => 'required|numeric',
            'coursebase_id' => 'required|numeric',
            // 'certificates_id' => 'required|numeric',
            'quota' => 'required|numeric',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after_or_equal:start_date',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'course_id' => 'nullable|numeric',
            'origin_id' => 'required|numeric',
            'categories_origin_id' => 'required|numeric',
            'entity_type_id' => 'required|numeric',
            'name'=>'required|between:1,500',
            'municipality_id' => 'required|numeric',
            'place'=>'nullable|between:1,500',
            'user_coordinate_id' => 'required|numeric',
            'initial_date' => 'required|date',
            'final_date' => 'required|date|after_or_equal:initial_date',
            'number_trainers' => 'required|numeric',
            'summoned_participants' => 'required|numeric',
            'contract_id' => 'numeric',
            'approved_status_id'=>'numeric',
            'approved_date' => 'date',
        ];
    }
}

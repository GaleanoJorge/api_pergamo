<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventDayRequest extends FormRequest
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
            'event_id' => 'required|numeric',
            'day_number' => 'required|numeric',
            'date_planned' => 'nullable|date',
            'description'=>'nullable',            
        ];
    }
}

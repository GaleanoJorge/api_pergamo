<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTicketRequest extends FormRequest
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
            'event_concept_id' => 'required|numeric',
            'passenger_user_id' => 'required|numeric',
            'origin'=>'required|between:1,255',
            'destination'=>'required|between:1,255',
            'back'=>'nullable|between:1,255',
            'departure_date' => 'required|date',           
            'return_date' => 'required|date',
            'departure_observations'=>'nullable|between:1,1000',
            'return_observations'=>'nullable|between:1,1000',
        ];
    }
}

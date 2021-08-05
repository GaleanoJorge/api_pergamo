<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'module_id' => 'required|numeric',
            'group_id' => 'required|numeric',
            'name' => 'required|between:1,191',
            'session_date' => 'required|date',
            'start_time' => 'required',
            'closing_time' => 'required|after:start_time',
        ];
    }
}

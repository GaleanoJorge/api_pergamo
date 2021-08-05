<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssistanceSessionRequest extends FormRequest
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
            'session_id' => 'nullable|numeric',
            'user_role_group_id' => 'nullable|numeric',
            'start_time' => 'required|between:1,191',
            'closing_time' => 'required|between:1,191',
        ];
    }
}

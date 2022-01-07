<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GlossConciliationsRequest extends FormRequest
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
            'gloss_id' => 'required',
            'observations' => 'required', 
            'cociliations_date'=> 'required',
            'objetion_code_response_id' => 'required',
            'accepted_value' => 'required',
            'value_not_accepted' => 'required',
            'file' => 'required',
            'user_id' => 'required',
        ];
    }
}

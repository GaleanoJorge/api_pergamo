<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagementPlanRequest extends FormRequest
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
            'type_of_attention_id' => 'required',
            'frequency_id' => 'required',
            'quantity' => 'required',
            'specialty_id',
            'admissions_id' => 'required',
            'assigned_user_id' => '',
            'procedure_id' => 'required',
        ];
    }
}

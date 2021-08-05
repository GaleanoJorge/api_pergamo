<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'code' => 'required',
            'date_ini' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_ini',
            'user_id' => 'required|numeric',
            'allocation_resource' => 'required|numeric',
            'contract_value' => 'required|numeric',
            'object'=>'required',
            'observations'=>'nullable',
            'contract_state_id'=>'required|numeric',
        ];
    }
}

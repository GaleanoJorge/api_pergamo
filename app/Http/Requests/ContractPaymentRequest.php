<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractPaymentRequest extends FormRequest
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
            'date_code' => 'required|date',
            'code_technical_concept' => 'required',
            'date_technical_concept' => 'required|date',
            'contract_id'=>'required|numeric',
        ];
    }
}

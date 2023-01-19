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
            'number_contract' => 'required',
            'name' => 'required',
            'company_id' => 'required',
            'type_contract_id' => 'required',
            'occasional' => 'required',
            'amount' => 'required',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after_or_equal:date_ini',
            'contract_status_id' => 'required',
            'regime_id' => 'required',
            'firms_contractor_id' => 'required',
            'firms_contracting_id' => 'required',
            'start_date_invoice' => 'required',
            'finish_date_invoice' => 'required',            
            'expiration_days_portafolio' => 'required',
            'discount' => 'required',
            'observations' => 'required',
            'objective' => 'required',
            
        ];
    }
}

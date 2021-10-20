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
            'status_id' => 'required',
            'firms_id' => 'required',
            'civil_policy_insurance_id' => 'required',
            'value_civil_policy' => 'required',
            'start_date_civil_policy' => 'required|date',
            'finish_date_civil_policy' => 'required|date|after_or_equal:date_ini',
            'contractual_policy_insurance_id' => 'required',
            'value_contractual_policy' => 'required',
            'start_date_contractual_policy' => 'required|date',
            'finish_date_contractual_policy' => 'required|date|after_or_equal:date_ini',
            'date_of_delivery_of_invoices' => 'required',
            'expiration_days_portafolio' => 'required',
            'discount' => 'required',
            'observations' => 'required',
            'objective' => 'required',
            
        ];
    }
}

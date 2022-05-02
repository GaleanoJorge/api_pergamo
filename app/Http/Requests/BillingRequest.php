<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingRequest extends FormRequest
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
            'num_evidence' => '',
            'sub_total' => '',
            'vat' => '',
            'setting_value' => '',
            'invoice_value' => '',
            'company_id' => '',
            'type_billing_evidence_id' => '',
        ];
    }
}

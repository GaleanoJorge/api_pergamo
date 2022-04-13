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
            'provider_name' => '',
            'num_evidence' => '',
            'ordered_quantity' => '',
            'sub_total' => '',
            'vat' => '',
            'setting_value' => '',
            'invoice_value' => '',
            'type_billing_evidence_id' => '',
            'pharmacy_stock_id' => '',
        ];
    }
}

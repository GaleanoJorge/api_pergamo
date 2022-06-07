<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingStockRequest extends FormRequest
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
            'amount' => 'required',
            'amount_unit' => 'required',
            'product_id' => 'required',
            'billing_id' => 'required',
        ];
    }
}

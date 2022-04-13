<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyLotRequest extends FormRequest
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
            'pharmacy_stock_id' => '',
            'enter_amount' => '',
            'unit_value' => '',
            'lot' => '',
            'expiration_date' => '',
            'billing_id' => '',
            'product_id' => '',
        ];
    }
}

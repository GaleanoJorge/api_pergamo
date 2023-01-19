<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyLotStockRequest extends FormRequest
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
            'lot' => '',
            'amount_total' => '',
            'sample' => '',
            'actual_amount' => '',
            'expiration_date' => '',
            'pharmacy_lot_id' => '',
            'billing_stock_id' => '',
            'pharmacy_stock_id' => '',
        ];
    }
}

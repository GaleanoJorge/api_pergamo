<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogPharmacyLotRequest extends FormRequest
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
            'lot' => 'required',
            'actual_amount' => 'required',
            'sample' => 'required',
            'expiration_date' => 'required',
            'billing_stock_id' => 'required',
            'pharmacy_lot_stock_id' => 'required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyInventoryRequest extends FormRequest
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
            'actual_amount' => '',
            'pharmacy_stock_id' => '',
            'pharmacy_lot_id' => '',
        ];
    }
}

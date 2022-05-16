<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyUpdateMaxMinRequest extends FormRequest
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
            'pharmacy_lot_stock_id' => '',
            'own_pharmacy_stock_id' => '',
            'request_pharmacy_stock_id' => '',
        ];
    }
}

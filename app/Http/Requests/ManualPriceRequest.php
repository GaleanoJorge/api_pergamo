<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManualPriceRequest extends FormRequest
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
            'name' => 'required',
            'own_code' => 'required',
            'manual_procedure_type_id' => 'required',
            'homologous_id' => '',
            'manual_id' => 'required',
            'procedure_id' => '',
            'supplies_id' => '',
            'product_id' => '',
            'value' => 'required',
            'price_type_id' => 'required'
        ];
    }
}

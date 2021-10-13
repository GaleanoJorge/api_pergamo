<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'code' => 'required',
            'name' => 'required',
            'factory_id' => 'required',
            'product_generic_id' => 'required',
            'invima_registration' => 'required',
            'invima_status_id' => 'required',
            'storage_conditions_id' => 'required',
            'risk_id' => 'required',
            'regulated_drug' => 'required',
            'high_price' => 'required',
            'maximum_dose' => 'required',
            'indications' => 'required',
            'contraindications' => 'required',
            'applications' => 'required',
            'generate_iva' => 'required',
        ];
    }
}
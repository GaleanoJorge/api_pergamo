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
            'name' => 'required',
            'factory_id' => 'required',
            'product_generic_id' => 'required',
            'invima_registration' => 'required',
            'invima_status_id' => 'required',
            'storage_conditions_id' => 'required',
            'indications' => 'required',
            'applications' => 'required',
            'unit_packing' => 'required',
            'packing_id' => 'required',
            'refrigeration' => 'required',
            'useful_life' => 'required',
        ];
    }
}
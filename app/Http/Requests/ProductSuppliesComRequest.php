<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSuppliesComRequest extends FormRequest
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
            'product_supplies_id' => 'required',
            'invima_registration' => 'required',
            'invima_status_id' => 'required',
            'unit_packing' => 'required',
            'packing_id' => 'required',
            'useful_life' => 'required',
        ];
    }
}
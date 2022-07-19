<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FixedAssetsRequest extends FormRequest
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
            'fixed_clasification_id' => 'required',
            'fixed_type_id' => 'required',
            'fixed_property_id' => 'required',
            'campus_id' => 'required',
            'amount_total' => 'required',
            'fixed_nom_product_id' => 'required',
            'detail_description' => 'required',
            'color' => 'required',
            'fixed_condition_id' => 'required',
        ];
    }
}

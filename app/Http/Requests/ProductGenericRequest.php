<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductGenericRequest extends FormRequest
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
            'name' => 'required',
            'drug_concentration_id' => 'required',
            'measurement_units_id' => 'required',
            'product_presentation_id' => 'required',
            'description' => 'required',
            'pbs_type_id'=> 'required',
            'product_subcategory_id'=> 'required',
            'consumption_unit_id'=> 'required',
            'administration_route_id'=> 'required',
            'special_controller_medicine'=> 'required',
            'code_atc'=> 'required',
            'implantable'=> 'required',
            'reuse'=> 'required',
            'invasive'=> 'required',
            'consignment'=> 'required',
        ];
    }
}

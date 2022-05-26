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
            'drug_concentration_id' => 'required',
            'measurement_units_id' => 'required',
            'product_presentation_id' => 'required',
            'description' => 'required',
            'pbs_type_id'=> 'required',
            'nom_product_id'=> 'required',
            'administration_route_id',
            'special_controller_medicine',
            'code_atc',
            'implantable',
            'reuse',
            'invasive',
            'consignment',
            'product_dose_id',
        ];
    }
}

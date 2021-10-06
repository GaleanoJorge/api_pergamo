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
            //
            'name' => 'required',
            'product_subcategory_id'=> 'required',
            'product_presentation_id' => 'required',
            'consumption_unit_id'=> 'required',
            'factory_id'=> 'required',
            'type_assets_id'=> 'required',
            'plate_number' => 'required'
            
        ];
    }
}

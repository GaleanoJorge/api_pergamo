<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChFormulationRequest extends FormRequest
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
            'product_generic_id' => 'required',
            'administration_route_id' => 'required',
            'hourly_frequency_id' => 'required',
            'medical_formula' => 'required',
            'treatment_days' => 'required',
            'observation' => 'required',
            'type_record_id' => 'required',
            'ch_record_id' => 'required',
            
            

        ];
    }
}

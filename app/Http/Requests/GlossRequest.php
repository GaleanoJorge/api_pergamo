<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GlossRequest extends FormRequest
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

            'objetion_type_id' => 'required',
            'company_id' => 'required',
            'campus_id' => 'required',
            'gloss_ambit_id' => 'required',
            'gloss_modality_id' => 'required',
            'gloss_service_id' => 'required',
            'objetion_code_id',
            'received_by_id' => 'required',
            'invoice_prefix' => 'required',
            'objetion_detail' => 'required',
            'invoice_consecutive' => 'required',
            'objeted_value' => 'required',
            'invoice_value' => 'required',
            'emission_date' => 'required',
            'radication_date' => 'required',
            'received_date' => 'required',
            'assing_user_id'=>'required',

        ];
    }
}

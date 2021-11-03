<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcedureRequest extends FormRequest
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
            'equivalent' => 'required',
            'name' => 'required',
            'procedure_category_id' => 'required',
            'pbs_type_id' => 'required',
            'procedure_age_id' => 'required',
            'gender_id' => 'required',
            'status_id' => 'required',
            'procedure_purpose_id' => 'required',
            'purpose_service_id' => 'required',
          

        ];
    }
}

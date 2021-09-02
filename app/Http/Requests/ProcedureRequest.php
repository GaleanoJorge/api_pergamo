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
            'prd_code' => 'required',
            'prd_equivalent' => 'required',
            'prd_name' => 'required',
            'prd_category' => 'required',
            'prd_nopos' => 'required',
            'prd_age' => 'required',
            'prd_gender' => 'required',
            'prd_state' => 'required',
            'prd_purpose' => 'required',
            'prd_time' => 'required',
          

        ];
    }
}

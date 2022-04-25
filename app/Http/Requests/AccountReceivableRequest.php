<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountReceivableRequest extends FormRequest
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
            'file_payment' => '',
            'user_id' => 'required',
            'gloss_ambit_id' => 'required',
            'status_bill_id' => '',
            'observation' => '',
            
 
           
        ];
    }
}

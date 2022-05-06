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
            'gross_value_activities' => '',
            'net_value_activities' => '',
            'user_id' => '',
            'status_bill_id' => '',
            'minimum_salary_id' => '',
            
 
           
        ];
    }
}

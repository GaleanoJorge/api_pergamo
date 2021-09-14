<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiiuClassRequest extends FormRequest
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
            'cic_code' => 'required',
            'cic_name' => 'required',
            'cic_group' => 'required',
                      
            
           
        ];
    }
}

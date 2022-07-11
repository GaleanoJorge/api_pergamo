<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChOstomiesRequest extends FormRequest
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
            'ostomy_id' => '',
            'ch_record_id' => '',
            'type_record_id'=> '',
        
  
            
        ];
    }
}

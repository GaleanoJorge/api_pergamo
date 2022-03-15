<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillUserActivityRequest extends FormRequest
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
            'num_activity' => 'required',
            'user_id' => 'required',
            'full_value' => 'required',
            'account_receivable_id' => 'required',
            'observation' => 'required',
           
        ];
    }
}

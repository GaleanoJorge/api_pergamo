<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffRequest extends FormRequest
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
            // 'name' => 'required',
            // 'amount' => 'required',
            // 'quantity' => 'required',
            // 'extra_dose' => 'required',
            // 'phone_consult' => 'required',
            // 'status_id' => 'required',
            // 'pad_risk_id' => 'required',
            // 'program_id' => 'required',
            // 'type_of_attention_id' => 'required',
        ];
    }
}

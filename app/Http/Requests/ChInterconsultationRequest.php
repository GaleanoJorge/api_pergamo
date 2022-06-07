<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChInterconsultationRequest extends FormRequest
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
            // 'specialty_id' => '',
            // 'amount' => '',
            // 'observations' => '',
            'type_record_id' => '',
            'ch_record_id' => '',
        ];
    }
}

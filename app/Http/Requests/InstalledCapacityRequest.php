<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstalledCapacityRequest extends FormRequest
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
            'user_id' => 'numeric',
            'start_date' => 'required',
            'finish_date' => 'required',
            'PAD_patient_quantity' => 'required|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseLocationCapacityRequest extends FormRequest
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
            // 'installed_capacity_id' => 'numeric',
            // 'residence_id' => 'required|numeric',
            // 'PAD_base_patient_quantity' => 'required|numeric',
        ];
    }
}

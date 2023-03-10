<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalDiaryDaysRequest extends FormRequest
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
            'assistance_id' => 'required',
            'weekdays' => 'required',
            'office_id' => 'required',
            'procedure_id' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required',
            'interval' => '',
            'telemedicine' => '',
            'patient_quantity' => '',
        ];
    }
}

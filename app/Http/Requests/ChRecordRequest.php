<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChRecordRequest extends FormRequest
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
            'status' => '',
            'date_attention' => '',
            'firm_file' => '',
            'admissions_id' => '',
            'assigned_management_plan_id',
            'user_id' => '',
            'date_finish' => ''
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogAssignedManagementPlanRequest extends FormRequest
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
            'user_id' => 'required',
            'assigned_management_plan_id' => 'required',
            'status' => 'required',
            'i_start_date' => 'required',
            'i_finish_date' => 'required',
            'i_user_id' => 'required',
            'i_start_hour' => 'required',
            'i_finish_hour' => 'required',
            'f_start_date' => 'required',
            'f_finish_date' => 'required',
            'f_user_id' => 'required',
            'f_start_hour' => 'required',
            'f_finish_hour' => 'required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BriefcaseRequest extends FormRequest
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
            'contract_id' => '',
            'name' => '',
            'type_briefcase_id' => '',
            'coverage_id' => '',
            'modality_id' => '',
            'status_id' => '',
            'type_auth' => '',
        ];
    }
}

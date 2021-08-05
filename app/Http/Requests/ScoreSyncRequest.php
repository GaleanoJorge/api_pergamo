<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreSyncRequest extends FormRequest
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
            'mac' => 'required',
            "state" => 'required',
            'id_student' => 'required|numeric',
            "id_criteria" => 'required|numeric',
            'id_delivery' => 'required|numeric',
            'id_logro' => 'required|numeric',
            'score' => 'required',
        ];
    }
}

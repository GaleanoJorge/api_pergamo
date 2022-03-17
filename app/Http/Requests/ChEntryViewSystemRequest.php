<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEntryViewSystemRequest extends FormRequest
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
            'condition' => 'required',
            'name_title' => 'required',
            'not_rated' => 'required',
            'normal' => 'required',
            'observation' => 'required'
        ];
    }
}

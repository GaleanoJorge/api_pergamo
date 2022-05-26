<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FixedLocationCampusRequest extends FormRequest
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
            'flat_id' => 'required',
            'campus_id' => 'required',
            'fixed_area_campus_id' => 'required',
        ];
    }
}

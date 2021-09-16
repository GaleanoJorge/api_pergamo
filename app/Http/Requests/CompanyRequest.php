<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        'company_id' => 'required',
        'identype_id' => 'required',
        'code' => 'required',
        'name' => 'required',
        'category' => 'required',
        'type' => 'required',
        'administrator' => 'required',
        'country_id' => 'required',
        'city_id' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'web' => 'required',
        'mail' => 'required',
        'representative' => 'required',
        'repre_phone' => 'required',
        'repre_mail' => 'required',
        'repre_identification' => 'required',
        'iva' => 'required',
        'retainer' => 'required',
        'kindperson_id' => 'required',
        'registration' => 'required',
        'opportunity' => 'required',
        'discount' => 'required',
        'term' => 'required',

        ];
    }
}

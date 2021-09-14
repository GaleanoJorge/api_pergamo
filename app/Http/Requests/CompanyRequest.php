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
        'com_company' => 'required',
        'com_identype' => 'required',
        'com_code' => 'required',
        'com_name' => 'required',
        'com_category' => 'required',
        'com_type' => 'required',
        'com_administrator' => 'required',
        'com_country' => 'required',
        'com_city' => 'required',
        'com_address' => 'required',
        'com_phone' => 'required',
        'com_web' => 'required',
        'com_mail' => 'required',
        'com_representative' => 'required',
        'com_repre_phone' => 'required',
        'com_repre_mail' => 'required',
        'com_repre_identification' => 'required',
        'com_iva' => 'required',
        'com_retainer' => 'required',
        'com_kindperson' => 'required',
        'com_registration' => 'required',
        'com_opportunity' => 'required',
        'com_discount' => 'required',
        'com_term' => 'required',

        ];
    }
}

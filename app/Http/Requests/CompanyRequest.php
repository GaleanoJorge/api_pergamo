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
        
        'identification_type_id' => 'required',
        'identification' => 'required',
        'verification' => 'required',
        'name' => 'required',
        'company_category_id' => 'required',
        'company_type_id' => 'required',
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
        'iva_id' => 'required',
        'retiner_id' => 'required',
        'company_kindperson_id' => 'required',
        'registration' => 'required',
        'opportunity' => 'required',
        'discount' => 'required',
        'payment_terms_id' => 'required',

        ];
    }
}

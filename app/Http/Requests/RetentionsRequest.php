<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetentionsRequest extends FormRequest
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
            'account_receivable_id' => 'required',
            'rrt_salary' => 'required',
            'rrt_comprehensive_salary' => 'required',
            'rrt_means_transport' => 'required',
            'rrt_holidays' => 'required',
            'incr_mandatory_pension_contributions' => 'required',
            'incr_mandatory_fund_contributions' => 'required',
            'incr_voluntary_contributions_funds' => 'required',
            'incr_non_rental_income' => 'required',
            'd_home_interest_payment' => 'required',
            'd_dependent_payments' => 'required',
            'd_health_payments' => 'required',
            're_contributions_voluntary_pension_fund' => 'required',
            're_contributions_accounts_AFC' => 'required',
            're_other_extensive_income' => 'required',
 
           
        ];
    }
}

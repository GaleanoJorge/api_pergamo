<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Retentions as BaseRetentions;

class Retentions extends BaseRetentions
{
    protected $fillable = [
      
		'account_receivable_id',
    'rrt_salary',
    'rrt_comprehensive_salary',
    'rrt_means_transport',
    'rrt_holidays',
    'incr_mandatory_pension_contributions',
    'incr_mandatory_fund_contributions',
    'incr_voluntary_contributions_funds',
    'incr_non_rental_income',
    'd_home_interest_payment',
    'd_dependent_payments',
    'd_health_payments',
    're_contributions_voluntary_pension_fund',
    're_contributions_accounts_AFC',
    're_other_extensive_income',
  

         
	
	];
}

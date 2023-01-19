<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Retentions
 * 
 * @property int $id
 * @property Biginteger $account_receivable_id
 * @property string $rrt_salary
 * @property string $rrt_comprehensive_salary
 * @property string $rrt_means_transport
 * @property string $rrt_holidays
 * @property string $incr_mandatory_pension_contributions
 * @property string $incr_mandatory_fund_contributions
 * @property string $incr_voluntary_contributions_funds
 * @property string $incr_non_rental_income
 * @property string $d_home_interest_payment
 * @property string $d_dependent_payments
 * @property string $d_health_payments
 * @property string $re_contributions_voluntary_pension_fund
 * @property string $re_contributions_accounts_AFC
 * @property string $re_other_extensive_income
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Retentions extends Model
{
	protected $table = 'retentions';

	
}

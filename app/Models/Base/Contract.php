<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CiiuGroup
 * 
 * @property int $id
 * @property string $number_contract
 * @property int $campus_id
 * @property int $type_contract_id
 * @property int $occasional
 * @property double $amount
 * @property date $start_date
 * @property date $finish_date
 * @property int $status_id
 * @property int $firms_contractor_id
 * @property int $firms_contracting_id
 * @property int $civil_policy_insurance_id
 * @property double $value_civil_policy
 * @property date $start_date_civil_policy
 * @property date $finish_date_civil_policy
 * @property int $contractual_policy_insurance_id
 * @property double $value_contractual_policy
 * @property date $start_date_contractual_policy
 * @property date $finish_date_contractual_policy
 * @property int $start_date_invoice
 * @property int $finish_date_invoice
 * @property int $time_delivery_invoice
 * @property int $expiration_days_portafolio
 * @property int $discount
 * @property string $observations
 * @property string $objective
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Contract extends Model
{
	protected $table = 'contract';

	
}

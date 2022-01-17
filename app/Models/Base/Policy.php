<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use App\Models\PolicyType;
use App\Models\InsuranceCarrier;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Policy
 * 
 * @property int $id
 * @property int $contract_id
 * @property int $policy_value
 * @property int $type_policy_id
 * @property int $insurance_carrier_id
 * @property date $start_date
 * @property date $finish_date
 * @property string $policy_file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Policy extends Model
{
	protected $table = 'policy';

	protected $casts = [
		'type_policy_id' => 'int',
		'insurance_carrier_id' => 'int',
	];

	public function policy_type()
	{
		return $this->belongsTo(PolicyType::class);
	}
	public function insurance_carrier()
	{
		return $this->belongsTo(InsuranceCarrier::class);
	}

	
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingPadPgp as ModelsBillingPadPgp;
use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingPadPgp
 * 
 * @property int $id
 * @property int $total_value
 * @property Date $validation_date
 * @property BigInteger $consecutive
 * @property BigInteger $contract_id
 * @property BigInteger $billing_pad_consecutive_id
 * @property BigInteger $billing_pad_prefix_id
 * @property BigInteger $billing_pad_status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingPadPgp extends Model
{
	protected $table = 'billing_pad_pgp';

	
	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}
	public function billing_pad_status()
	{
		return $this->belongsTo(BillingPadStatus::class);
	}
	public function billing_pad_consecutive()
	{
		return $this->belongsTo(BillingPadConsecutive::class);
	}
	public function billing_pad_prefix()
	{
		return $this->belongsTo(BillingPadPrefix::class);
	}
}

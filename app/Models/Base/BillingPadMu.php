<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingPadMu as ModelsBillingPadMu;
use App\Models\Contract;
use App\Models\BillingPadMu as BPPGP;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingPadMu
 * 
 * @property int $id
 * @property int $total_value
 * @property Date $validation_date
 * @property Date $facturation_date
 * @property BigInteger $consecutive
 * @property BigInteger $billing_pad_consecutive_id
 * @property BigInteger $billing_pad_prefix_id
 * @property BigInteger $billing_pad_status_id
 * @property BigInteger $billing_credit_note_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingPadMu extends Model
{
	protected $table = 'billing_pad_mu';

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
	public function billing_credit_note()
	{
		return $this->belongsTo(BPPGP::class);
	}
	public function its_credit_note()
	{
		return $this->belongsTo(BPPGP::class, 'id', 'billing_credit_note_id');
	}
}

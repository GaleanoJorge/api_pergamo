<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Admissions;
use App\Models\BillingPadConsecutive;
use App\Models\BillingPadPrefix;
use App\Models\BillingPadStatus;
use App\Models\BillingPadPgp;
use App\Models\BillingPad as BP;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingPad
 * 
 * @property int $id
 * @property int $total_value
 * @property Date $validation_date
 * @property Date $facturation_date
 * @property BigInteger $billing_pad_consecutive_id
 * @property BigInteger $billing_pad_prefix_id
 * @property BigInteger $billing_pad_status_id
 * @property BigInteger $admissions_id
 * @property BigInteger $billing_pad_pgp_id
 * @property BigInteger $billing_credit_note_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingPad extends Model
{
	protected $table = 'billing_pad';

	
	public function billing_pad_consecutive()
	{
		return $this->belongsTo(BillingPadConsecutive::class);
	}
	public function billing_pad_prefix()
	{
		return $this->belongsTo(BillingPadPrefix::class);
	}
	public function billing_pad_status()
	{
		return $this->belongsTo(BillingPadStatus::class);
	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function billing_pad_pgp()
	{
		return $this->belongsTo(BillingPadPgp::class);
	}
	public function billing_credit_note()
	{
		return $this->belongsTo(BP::class);
	}
	public function its_credit_note()
	{
		return $this->belongsTo(BP::class, 'id', 'billing_credit_note_id');
	}
}

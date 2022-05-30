<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Admissions;
use App\Models\BillingPadStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingPad
 * 
 * @property int $id
 * @property int $total_value
 * @property Date $validation_date
 * @property BigInteger $billing_pad_status_id
 * @property BigInteger $admissions_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingPad extends Model
{
	protected $table = 'billing_pad';

	
	public function billing_pad_status()
	{
		return $this->belongsTo(BillingPadStatus::class);
	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
}

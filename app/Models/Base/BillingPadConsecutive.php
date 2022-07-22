<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingPadPrefix;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingPadConsecutive
 * 
 * @property int $id
 * @property string $resolution
 * @property BigInteger $initial_consecutive
 * @property BigInteger $final_consecutive
 * @property BigInteger $actual_consecutive
 * @property Date $expiracy_date
 * @property string $resolution
 * @property integer $status_id
 * @property integer $billing_pad_prefix_id
 *
 * @package App\Models\Base
 */
class BillingPadConsecutive extends Model
{
	protected $table = 'billing_pad_consecutive';

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function billing_pad_prefix()
	{
		return $this->belongsTo(BillingPadPrefix::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingPad;
use App\Models\BillingPadMu;
use App\Models\BillingPadPgp;
use App\Models\BillingPadStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingPadLog
 * 
 * @property int $id
 * @property BigInteger $billing_pad_pgp_id
 * @property BigInteger $billing_pad_mu_id
 * @property BigInteger $billing_pad_id
 * @property BigInteger $billing_pad_status_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingPadLog extends Model
{
	protected $table = 'billing_pad_log';

	
	public function billing_pad_pgp()
	{
		return $this->belongsTo(BillingPadPgp::class);
	}
	public function billing_pad_mu()
	{
		return $this->belongsTo(BillingPadMu::class);
	}
	public function billing_pad()
	{
		return $this->belongsTo(BillingPad::class);
	}
	public function billing_pad_status()
	{
		return $this->belongsTo(BillingPadStatus::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

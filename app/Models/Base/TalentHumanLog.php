<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingPad;
use App\Models\BillingPadStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TalentHumanLog
 * 
 * @property int $id
 * @property BigInteger $billing_pad_id
 * @property BigInteger $billing_pad_status_id
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class TalentHumanLog extends Model
{
	protected $table = 'talent_human_log';

	
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

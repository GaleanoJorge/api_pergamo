<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Authorization;
use App\Models\BillingPad;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthBillingPad
 * 
 * @property int $id
 * @property BigInteger $billing_pad_id
 * @property BigInteger $authorization_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AuthBillingPad extends Model
{
	protected $table = 'auth_billing_pad';

	
	public function billing_pad()
	{
		return $this->belongsTo(BillingPad::class);
	}
	public function authorization()
	{
		return $this->belongsTo(Authorization::class);
	}
}

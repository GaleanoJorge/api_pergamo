<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

/**
 * Class Reports
 * 
 * @property int $id 
 * @property Date $initial_report
 * @property Date $final_report
 * @property BigInteger $billing_pad
 * @property BigInteger $user_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ReportBilling extends Model
{
	protected $table = 'billing';

	public function billing()
	{
		return $this->belongsTo(Billing::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\PharmacyRequestShipping;
use App\Models\User;

/**
 * Class LogPharmacyShipping
 * 
 * @property int $id
 * @property BigInteger $pharmacy_request_shipping_id
 * @property BigInteger $user_id
 * @property string $status
 * @property string $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class LogPharmacyShipping extends Model
{
	protected $table = 'log_pharmacy_shipping';

	public function pharmacy_request_shipping()
	{
		return $this->belongsTo(PharmacyRequestShipping::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}

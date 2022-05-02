<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyRequestStock
 * 
 * @property int $id 
 * @property string $amount 
 * @property BigInteger $pharmacy_request_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyRequestStock extends Model
{
	protected $table = 'pharmacy_request_stock';

	public function product()
	{
		return $this->belongsTo(PharmacyRequest::class);
	}
}

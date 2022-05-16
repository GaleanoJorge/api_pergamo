<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyLotStock;
use App\Models\PharmacyProductRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyRequestShipping
 * 
 * @property int $id 
 * @property number $amount
 * @property number $amount_damaged
 * @property number $amount_provition
 * @property BigInteger $pharmacy_product_request_id
 * @property BigInteger $pharmacy_lot_stock_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyRequestShipping extends Model
{
	protected $table = 'pharmacy_request_shipping';


	public function pharmacy_lot_stock()
	{
		return $this->belongsTo(PharmacyLotStock::class);
	}

	public function pharmacy_product_request()
	{
		return $this->belongsTo(PharmacyProductRequest::class);
	}
}

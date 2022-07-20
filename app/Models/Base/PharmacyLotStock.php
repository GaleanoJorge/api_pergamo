<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingStock;
use App\Models\PharmacyLot;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyLot
 * 
 * @property int $id 
 * @property string $lot
 * @property string $amount_total
 * @property string $sample
 * @property string $actual_amount
 * @property date $expiration_date
 * @property BigInteger $pharmacy_lot_id
 * @property BigInteger $billing_stock_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyLotStock extends Model
{
	protected $table = 'pharmacy_lot_stock';

	public function pharmacy_lot()
	{
		return $this->belongsTo(PharmacyLot::class);
	}
	
	public function billing_stock()
	{
		return $this->belongsTo(BillingStock::class,'billing_stock_id');
	}
	
}

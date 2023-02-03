<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingStock;
use App\Models\PharmacyLotStock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Class LogPharmacyLot
 * 
 * @property int $id
 * @property BigInteger $billing_stock_id
 * @property BigInteger $pharmacy_lot_stock_id
 * @property string $lot
 * @property string $actual_amount
 * @property string $sample
 * @property date $expiration_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class LogPharmacyLot extends Model
{
	protected $table = 'log_pharmacy_lot';

	public function billing_stock()
	{
		return $this->belongsTo(BillingStock::class);
	}
	public function pharmacy_lot_stock()
	{
		return $this->belongsTo(PharmacyLotStock::class);
	}
	
}

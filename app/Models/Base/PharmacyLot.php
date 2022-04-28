<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Billing;
use App\Models\BillingStock;
use App\Models\PharmacyStock;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyLot
 * 
 * @property int $id 
 * @property string $enter_amount
 * @property string $unit_value
 * @property string $lot
 * @property date $expiration_date
 * @property BigInteger $pharmacy_stock_id
 * @property BigInteger $billing_id
 * @property BigInteger $billing_stock_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyLot extends Model
{
	protected $table = 'pharmacy_lot';

	public function pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
	public function billing_stock()
	{
		return $this->belongsTo(BillingStock::class);
	}
	public function billing()
	{
		return $this->belongsTo(Billing::class);
	}
}

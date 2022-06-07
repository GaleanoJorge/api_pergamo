<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BillingStock;
use App\Models\PharmacyStock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyLot
 * 
 * @property int $id 
 * @property string $subtotal
 * @property string $vat
 * @property string $total
 * @property date $receipt_date
 * @property BigInteger $pharmacy_stock_id
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
	
}

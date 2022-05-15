<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyLotStock;
use App\Models\PharmacyStock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyUpdateMaxMin
 * 
 * @property int $id 
 * @property BigInteger $pharmacy_lot_stock_id
 * @property BigInteger $own_pharmacy_stock_id
 * @property BigInteger $request_pharmacy_stock_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyUpdateMaxMin extends Model
{
	protected $table = 'pharmacy_update_max_min';

	public function pharmacy_lot_stock()
	{
		return $this->belongsTo(PharmacyLotStock::class);
	}

	public function request_pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
	public function own_pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyLot;
use App\Models\PharmacyStock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyInventory
 * 
 * @property int $id 
 * @property string $actual_amount
 * @property BigInteger $pharmacy_lot_id
 * @property BigInteger $pharmacy_stock_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyInventory extends Model
{
	protected $table = 'pharmacy_inventory';


	public function pharmacy_lot()
	{
		return $this->belongsTo(PharmacyLot::class);
	}

	public function pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
}

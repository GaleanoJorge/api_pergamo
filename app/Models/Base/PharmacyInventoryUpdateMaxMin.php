<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyInventory;
use App\Models\PharmacyProductRequest;
use App\Models\PharmacyStock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyUpdateMaxMin
 * 
 * @property int $id 
 * @property BigInteger $pharmacy_stock_id
 * @property BigInteger $pharmacy_inventory_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyUpdateMaxMin extends Model
{
	protected $table = 'pharmacy_update_max_min';

	public function pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}

	public function pharmacy_inventory()
	{
		return $this->belongsTo(PharmacyInventory::class);
	}
}

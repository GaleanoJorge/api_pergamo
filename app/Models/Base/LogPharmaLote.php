<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyAdjustment;
use App\Models\PharmacyLotStock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogPharmaLote
 * 
 * @property int $id
 * @property BigInteger $pharmacy_adjustment_id
 * @property BigInteger $pharmacy_lot_stock_id
 * @property string $actual_amount
 * @property string $amount
 * @property string $sign
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * 
 *
 * @package App\Models\Base
 */
class LogPharmaLote extends Model
{
	protected $table = 'log_pharma_lote';

	public function pharmacy_lot_stock()
	{
		return $this->belongsTo(PharmacyLotStock::class);
	}

	public function pharmacy_adjustment()
	{
		return $this->belongsTo(PharmacyAdjustment::class);
	}
	
}

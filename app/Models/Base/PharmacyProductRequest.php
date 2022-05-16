<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyStock;
use App\Models\ProductGeneric;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PharmacyProductRequest
 * 
 * @property int $id 
 * @property string $status
 * @property string $observation
 * @property intenger $request_amount
 * @property BigInteger $product_generic_id
 * @property BigInteger $own_pharmacy_stock_id
 * @property BigInteger $request_pharmacy_stock_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyProductRequest extends Model
{
	protected $table = 'pharmacy_product_request';

	public function own_pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
	public function request_pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}
	public function product_generic()
	{
		return $this->belongsTo(ProductGeneric::class);
	}
}

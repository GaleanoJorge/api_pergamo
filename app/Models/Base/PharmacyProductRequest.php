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
 * Class Billing
 * 
 * @property int $id 
 * @property integer $amount
 * @property BigInteger $product_generic_id
 * @property BigInteger $pharmacy_stock_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PharmacyProductRequest extends Model
{
	protected $table = 'pharmacy_product_request';

	public function pharmacy_stock()
	{
		return $this->belongsTo(PharmacyStock::class);
	}

	public function product_generic()
	{
		return $this->belongsTo(ProductGeneric::class);
	}
}

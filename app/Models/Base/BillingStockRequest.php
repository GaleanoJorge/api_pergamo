<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Billing;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingStockRequest
 * 
 * @property int $id 
 * @property string $amount 
 * @property BigInteger $product_generic_id
 * @property BigInteger $product_supplies_id
 * @property BigInteger $billing_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingStockRequest extends Model
{
	protected $table = 'billing_stock_request';

	public function product_generic()
	{
		return $this->belongsTo(ProductGeneric::class);
	}
	public function billing()
	{
		return $this->belongsTo(Billing::class);
	}
	public function product_supplies()
	{
		return $this->belongsTo(ProductSupplies::class);
	}
}

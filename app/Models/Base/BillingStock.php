<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Billing;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingStock
 * 
 * @property int $id 
 * @property string $amount 
 * @property string $amount_unit 
 * @property BigInteger $product_id
 * @property BigInteger $billing_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class BillingStock extends Model
{
	protected $table = 'billing_stock';

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
	public function billing()
	{
		return $this->belongsTo(Billing::class);
	}
}

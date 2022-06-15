<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PharmacyStock;
use App\Models\ProductGeneric;
use App\Models\ServicesBriefcase;
use App\Models\User;
use App\Models\Admissions;
use App\Models\ProductSupplies;
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
 * @property BigInteger $admissions_id
 * @property BigInteger $own_pharmacy_stock_id
 * @property BigInteger $product_supplies_id
 * @property BigInteger $request_pharmacy_stock_id
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
	public function product_supplies()
	{
		return $this->belongsTo(ProductSupplies::class);
	}
	public function services_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class);
	}
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}

	public function users()
	{
		return $this->belongsTo(User::class,'user_request_id');
	}
}

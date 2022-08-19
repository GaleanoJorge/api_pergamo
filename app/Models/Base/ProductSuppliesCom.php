<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factory;
use App\Models\Packing;
use App\Models\ProductSupplies;

/**
 * Class ProductSuppliesCom
 
 * 
 * @property int $id
 * @property string $name
 * @property int $factory_id
 * @property string $invima_registration
 * @property int $invima_status_id
 * @property int $sanitary_registration_id
 * @property string $code_udi
 * @property string $unit_packing
 * @property string $useful_life
 * @property BigInteger $packing_id
 * @property BigInteger $product_supplies_id
 * @property date $date_cum
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProductSuppliesCom extends Model
{
	protected $table = 'product_supplies_com';
	public function factory()
	{
		return $this->belongsTo(Factory::class);
	}

	public function product_supplies()
	{
		return $this->belongsTo(ProductSupplies::class);
	}
	public function packing()
	{
		return $this->belongsTo(Packing::class);
	}

	
}
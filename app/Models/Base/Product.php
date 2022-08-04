<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factory;
use App\Models\Packing;
use App\Models\ProductGeneric;

/**
 * Class Product
 
 * 
 * @property int $id
 * @property string $name
 * @property int $factory_id
 * @property string $invima_registration
 * @property int $invima_status_id
 * @property int $sanitary_registration_id
 * @property int $storage_conditions_id
 * @property string $code_cum_file
 * @property int $code_cum_consecutive
 * @property int $regulated_drug
 * @property int $high_price
 * @property int $maximum_dose
 * @property string $indications
 * @property string $contraindications
 * @property string $applications
 * @property string $value_circular
 * @property string $circular
 * @property string $unit_packing
 * @property string $refrigeration
 * @property string $useful_life
 * @property string $code_cum
 * @property BigInteger $packing_id
 * @property BigInteger $product_generic_id
 * @property date $date_cum
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Product extends Model
{
	protected $table = 'product';
	public function factory()
	{
		return $this->belongsTo(Factory::class);
	}

	public function product_generic()
	{
		return $this->belongsTo(ProductGeneric::class);
	}
	public function packing()
	{
		return $this->belongsTo(Packing::class);
	}

	
}
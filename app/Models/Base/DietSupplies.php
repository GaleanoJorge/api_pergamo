<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietSupplyType;
use App\Models\MeasurementUnits;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietSupplies
 * 
 * @property int $id
 * @property string $name
 * @property BigInteger $diet_supply_type_id
 * @property BigInteger $measurement_units_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietSupplies extends Model
{
	protected $table = 'diet_supplies';

	
	public function diet_supply_type()
	{
		return $this->belongsTo(DietSupplyType::class);
	}
	public function measurement_units()
	{
		return $this->belongsTo(MeasurementUnits::class);
	}
}

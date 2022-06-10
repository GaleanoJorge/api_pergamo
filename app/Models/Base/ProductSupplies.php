<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\SuppliesMeasure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSupplies
 
 * 
 * @property int $id
 * @property string $size
 * @property string $measure
 * @property string $description
 * @property string $stature
 * @property integer $minimum_stock
 * @property integer $maximum_stock
 * @property BigInteger $size_supplies_measure_id
 * @property BigInteger $measure_supplies_measure_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ProductSupplies extends Model
{
	protected $table = 'product_supplies';
 
	public function size_supplies_measure()
	{
		return $this->belongsTo(SuppliesMeasure::class);
	}

	public function measure_supplies_measure()
	{
		return $this->belongsTo(SuppliesMeasure::class);
	}

}

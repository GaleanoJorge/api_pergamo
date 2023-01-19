<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietDish;
use App\Models\DietSupplies;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietDishStock
 * 
 * @property int $id
 * @property double $amount
 * @property BigInteger $diet_dish_id
 * @property BigInteger $diet_supplies_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietDishStock extends Model
{
	protected $table = 'diet_dish_stock';

	
	public function diet_dish()
	{
		return $this->belongsTo(DietDish::class);
	}
	public function diet_supplies()
	{
		return $this->belongsTo(DietSupplies::class);
	}
}

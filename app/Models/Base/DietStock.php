<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietSupplies;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietStock
 * 
 * @property int $id
 * @property double $amount
 * @property BigInteger $diet_supplies_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietStock extends Model
{
	protected $table = 'diet_stock';

	
	public function diet_supplies()
	{
		return $this->belongsTo(DietSupplies::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\FixedType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedStock
 * 
 * @property int $id 
 * @property BigInteger $fixed_type_id
 * @property BigInteger $campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedStock extends Model
{
	protected $table = 'fixed_stock';

	public function fixed_type()
	{
		return $this->belongsTo(FixedType::class);
	}
	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
}

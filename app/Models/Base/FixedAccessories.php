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
 * Class FixedAccessories
 * 
 * @property int $id 
 * @property string $name
 * @property integer $amount_total
 * @property integer $actual_amount
 * @property BigInteger $fixed_type_id
 * @property BigInteger $campus_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedAccessories extends Model
{
	protected $table = 'fixed_accessories';

	public function fixed_type()
	{
		return $this->belongsTo(FixedType::class);
	}
	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
}

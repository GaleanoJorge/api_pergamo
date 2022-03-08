<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietConsistency;
use App\Models\DietComponent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietTherapeutic
 * 
 * @property int $id
 * @property string $name
 * @property BigInteger $diet_consistency_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietTherapeutic extends Model
{
	protected $table = 'diet_therapeutic';

	
	public function diet_consistency()
	{
		return $this->belongsTo(DietConsistency::class);
	}
}

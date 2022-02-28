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
 * Class DietTherapeuticComponent
 * 
 * @property int $id
 * @property BigInteger $diet_therapeutic_id
 * @property BigInteger $diet_component_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietTherapeuticComponent extends Model
{
	protected $table = 'diet_therapeutic_component';

	
	public function diet_therapeutic()
	{
		return $this->belongsTo(DietTherapeutic::class);
	}
	public function diet_component()
	{
		return $this->belongsTo(DietComponent::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietComponent;
use App\Models\DietAdmission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietAdmissionComponent
 * 
 * @property int $id
 * @property BigInteger $diet_admission_id
 * @property BigInteger $diet_component_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietAdmissionComponent extends Model
{
	protected $table = 'diet_admission_component';

	
	public function diet_admission()
	{
		return $this->belongsTo(DietAdmission::class);
	}
	public function diet_component()
	{
		return $this->belongsTo(DietComponent::class);
	}
}

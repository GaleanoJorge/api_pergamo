<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrationRoute
 
 * 
 * @property int $id
 * @property boolean $is_functional
 * @property double $weight
 * @property double $size
 * @property double $arm_circunferency
 * @property double $calf_circumference
 * @property double $knee_height
 * @property double $abdominal_perimeter
 * @property double $hip_perimeter
 * @property double $geteratedIMC
 * @property string $classification
 * @property double $estimated_weight
 * @property double $estimated_size
 * @property double $total_energy_expenditure
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChNutritionAnthropometry extends Model
{
	protected $table = 'ch_nutrition_anthropometry';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class, 'type_record_id');
	
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class, 'ch_record_id');
	}
}
